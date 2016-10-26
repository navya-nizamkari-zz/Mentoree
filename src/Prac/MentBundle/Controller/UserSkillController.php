<?php

namespace Prac\MentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prac\MentBundle\Entity\UserSkill;
use Prac\MentBundle\Form\UserSkillType;

/**
 * UserSkill controller.
 *
 */
class UserSkillController extends Controller
{
    /**
     * Lists all UserSkill entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userSkills = $em->getRepository('MentBundle:UserSkill')->findAll();

        return $this->render('userskill/index.html.twig', array(
            'userSkills' => $userSkills,
        ));
    }

    /**
     * Creates a new UserSkill entity.
     *
     */
    public function newAction(Request $request)
    {
        $userSkill = new UserSkill();
        $form = $this->createForm('Prac\MentBundle\Form\UserSkillType', $userSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userSkill);
            $em->flush();

            return $this->redirectToRoute('userskill_show', array('id' => $userSkill->getId()));
        }

        return $this->render('userskill/new.html.twig', array(
            'userSkill' => $userSkill,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserSkill entity.
     *
     */
    public function showAction(UserSkill $userSkill)
    {
        $deleteForm = $this->createDeleteForm($userSkill);

        return $this->render('userskill/show.html.twig', array(
            'userSkill' => $userSkill,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserSkill entity.
     *
     */
    public function editAction(Request $request, UserSkill $userSkill)
    {
        $deleteForm = $this->createDeleteForm($userSkill);
        $editForm = $this->createForm('Prac\MentBundle\Form\UserSkillType', $userSkill);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userSkill);
            $em->flush();

            return $this->redirectToRoute('userskill_edit', array('id' => $userSkill->getId()));
        }

        return $this->render('userskill/edit.html.twig', array(
            'userSkill' => $userSkill,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a UserSkill entity.
     *
     */
    public function deleteAction(Request $request, UserSkill $userSkill)
    {
        $form = $this->createDeleteForm($userSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userSkill);
            $em->flush();
        }

        return $this->redirectToRoute('userskill_index');
    }

    /**
     * Creates a form to delete a UserSkill entity.
     *
     * @param UserSkill $userSkill The UserSkill entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserSkill $userSkill)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userskill_delete', array('id' => $userSkill->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
