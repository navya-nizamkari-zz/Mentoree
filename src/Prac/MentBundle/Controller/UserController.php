<?php

namespace Prac\MentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prac\MentBundle\Entity\User;
use Prac\MentBundle\Form\UserType;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * User controller.
 *
 */
class UserController extends FOSRestController implements ClassResourceInterface
{
	public function getAction($company)
	{
		//return $this->getDoctrine()->getRepository('MentBundle:Category')->find($id);
		$users= $this->get('prac.doctrine_entity_repository.user')->findByCompany($company);
	
		if ($users === null) {
			return new View(null, Response::HTTP_NOT_FOUND);
		}
	
		return $users;
	}
	
	public function cgetAction()
	{
		//return $this->getDoctrine()->getRepository('MentBundle:Category')->find($id);
		$users= $this->get('prac.doctrine_entity_repository.user')->findAll();
	
		if ($users === null) {
			return new View(null, Response::HTTP_NOT_FOUND);
		}
	
		return $users;
	}
	
	public function postAction(Request $request)
	{
		$form = $this->createForm(UserType::class, null, [
				'csrf_protection' => false,
		]);
	
		$form->submit($request->request->all());
	
		if (!$form->isValid()) {
			return $form;
		}
		/**
		 * @var $user User
		 */
		$user = $form->getData();
	
		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();
	
		$routeOptions = [
				'id' => $user->getId(),
				'_format' => $request->get('_format'),
		];
	
		return $this->routeRedirectView('get_user', $routeOptions, Response::HTTP_CREATED);
	}
	
	public function putAction(Request $request, $id)
	{
		$user = $this->get('prac.doctrine_entity_repository.user')->find($id);
	
		if ($user === null) {
			return new View(null, Response::HTTP_NOT_FOUND);
		}
	
		$form = $this->createForm(UserType::class, $user, [
				'csrf_protection' => false,
		]);
	
		$form->submit($request->request->all());
	
		if (!$form->isValid()) {
			return $form;
		}
	
		$em = $this->getDoctrine()->getManager();
		$em->flush();
	
		$routeOptions = [
				'id' => $user->getId(),
				'_format' => $request->get('_format'),
		];
	
		return $this->routeRedirectView('get_user', $routeOptions, Response::HTTP_NO_CONTENT);
	}
	
	
	public function patchAction(Request $request, $id)
	{
		$user = $this->get('prac.doctrine_entity_repository.user')->find($id);
	
		if ($user === null) {
			return new View(null, Response::HTTP_NOT_FOUND);
		}
	
		$form = $this->createForm(UserType::class, $user, [
				'csrf_protection' => false,
		]);
	
		$form->submit($request->request->all(), false);
	
		if (!$form->isValid()) {
			return $form;
		}
	
		$em = $this->getDoctrine()->getManager();
		$em->flush();
	
		$routeOptions = [
				'id' => $user->getId(),
				'_format' => $request->get('_format'),
		];
	
		return $this->routeRedirectView('get_user', $routeOptions, Response::HTTP_NO_CONTENT);
	}

	
	public function deleteAction($id)
	{
		
		$user = $this->get('prac.doctrine_entity_repository.user')->find($id);
	
		if ($user === null) {
			return new View(null, Response::HTTP_NOT_FOUND);
		}
	
		$em = $this->getDoctrine()->getManager();
		$em->remove($user);
		$em->flush();
	
		return new View(null, Response::HTTP_NO_CONTENT);
	}
	
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
	
		$users = $em->getRepository('MentBundle:User')->findAll();
	
		return $this->render('user/index.html.twig', array(
				'users' => $users,
		));
	}
	
	/**
	 * Creates a new User entity.
	 *
	 */
	public function newAction(Request $request)
	{
		$user = new User();
		$form = $this->createForm('Prac\MentBundle\Form\UserType', $user);
		$form->handleRequest($request);
	
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
	
			return $this->redirectToRoute('prac_ment_show', array('id' => $user->getId()));
		}
	
		return $this->render('user/new.html.twig', array(
				'user' => $user,
				'form' => $form->createView(),
		));
	}
	
	/**
	 * Finds and displays a User entity.
	 *
	 */
	public function showAction(User $user)
	{
		$deleteForm = $this->createDeleteForm($user);
	
		return $this->render('user/show.html.twig', array(
				'user' => $user,
				'delete_form' => $deleteForm->createView(),
		));
	}
	
	/**
	 * Displays a form to edit an existing User entity.
	 *
	 */
	public function editAction(Request $request, User $user)
	{
		$deleteForm = $this->createDeleteForm($user);
		$editForm = $this->createForm('Prac\MentBundle\Form\UserType', $user);
		$editForm->handleRequest($request);
	
		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
	
			return $this->redirectToRoute('prac_ment_edit', array('id' => $user->getId()));
		}
	
		return $this->render('user/edit.html.twig', array(
				'user' => $user,
				'edit_form' => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
		));
	}
	
	/**
	 * Deletes a User entity.
	 *
	 */
	public function deleteUserAction(Request $request, User $user)
	{
		$form = $this->createDeleteForm($user);
		$form->handleRequest($request);
	
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($user);
			$em->flush();
		}
	
		return $this->redirectToRoute('prac_ment_index');
	}
	
	/**
	 * Creates a form to delete a User entity.
	 *
	 * @param User $user The User entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(User $user)
	{
		return $this->createFormBuilder()
		->setAction($this->generateUrl('prac_ment_delete', array('id' => $user->getId())))
		->setMethod('DELETE')
		->getForm()
		;
	}
	
	
}
