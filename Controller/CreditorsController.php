<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;

class CreditorsController extends FOSRestController
{

    /**
     * Collection get action
     * @var Request $request
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     * @return array
     *
     * @Rest\QueryParam(name="page", requirements="\d+", default=1, description="Page from which to start listing pages.")
     * @Rest\QueryParam(name="per_page", requirements="\d+", default="10", description="How many pages to return.")
     * @Rest\View()
     */
    public function getCreditorsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $searchParams = Arr::except($request->query->all(), ['page', 'per_page']);
        $pagination = $this->get('creditor')->all($paramFetcher->get('page'), $paramFetcher->get('per_page'), $searchParams);

        $data['creditors'] = $pagination->getItems();
        $data['meta'] = [
            'total_pages' => $pagination->getPaginationData()['pageCount']
        ];

        return $data;
    }

    /**
     * @param $id
     * @return array
     * @Rest\View()
     */
    public function getCreditorAction($id)
    {
        if (!$creditor = $this->get('creditor')->find($id)) {
            throw $this->createNotFoundException('Unable to find creditor.');
        }

        return compact('creditor');
    }

    /**
     * @param Request $request
     * @return array|\FOS\RestBundle\View\View
     * @Rest\View()
     */
    public function postCreditorAction(Request $request) {
        $service = $this->get('creditor');

        if ($creditor = $service->create($request->request->all())) {

            return ['creditor' => $creditor];
        }

        return $this->view(['errors' => $service->getValidationErrors()], 400);
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|\FOS\RestBundle\View\View
     */
    public function putCreditorAction(Request $request, $id) {
        $service = $this->get('creditor');
        if (!$creditor = $service->find($id)) {
            throw $this->createNotFoundException('Unable to find creditor.');
        }

        if ($creditor = $service->update($creditor, $request->request->all())) {

            return ['creditor' => $creditor];
        }

        return $this->view(['errors' => $service->getValidationErrors()], 400);
    }

    /**
     * @param $id
     * @return \FOS\RestBundle\View\View
     */
    public function deleteCreditorAction($id) {
        $service = $this->get('creditor');

        if (!$creditor = $service->find($id)) {
            throw $this->createNotFoundException('Unable to find creditor.');
        }

        $service->delete($creditor);

        return $this->view(['message' => 'Successfully removed']);
    }

}
