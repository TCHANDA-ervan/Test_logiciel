<?php
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;
use src\ContactService;
/**
 * * @covers invalidInputException
 * @covers \ContactService
 *
 * @internal
 */
final class ContactServiceUnitTest extends TestCase
{
    private $contactService;
    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->contactService = new ContactService();
    }
    // //test Création Contact Sans Texte ok
    // public function testCreationContactWithoutAnyText() {
    //     $this->expectException(Exception::class);
    //     $this->expectExceptionMessage("le nom  doit être renseigné");
    //     $contactService = new ContactService();
    //     $contactService->createContact(null,null);
    // }
    //test Création Contact Sans Prenom
    public function testCreationContactWithoutPrenom() 
    {
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('le prenom doit être renseigné');
        $contactService = new ContactService();
        $contactService->createContact("wenji", null);
    }
    //test Création Contact Sans Prenom
    public function testCreationContactWithoutNom()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('le nom  doit être renseigné');
        $contactService = new ContactService();
        $contactService->createContact(null, "pascal");
    }
    //test Rechercher un contact avec un numéro
    public function testSearchContactWithNumber() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('search doit être une chaine de caractères');
        $contactService = new ContactService();
        $contactService->searchContact(2);
    }
    //test Rechercher un contactSans Texte ok
    public function testSearchContactWithAnyText()
    {   
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('search doit être renseigné');
        $contactService = new ContactService();
        $contactService->searchContact("");
    }
    //ok
    public function testModifyContactWithInvalidId() 
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("l'id doit être un entier non nul");
        $contactService = new ContactService();
        $contactService->UpdateContact(-5, "pascal", "loic");
    }
    //test Supprimer le contact avec le texte comme identifiant ok
    public function testDeleteContactWithTextAsId()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("l'id doit être un entier non nul");
        $contactService = new ContactService();
        $contactService->deleteContact("zozo");
    }
}
