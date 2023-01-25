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
final class ContactServiceIntegrationTest extends TestCase
{
    private $contactService;

    public function __construct(string $name = null, array $data = [], $dataName = '') 
    {
        parent::__construct($name, $data, $dataName);
        $this->contactService = new ContactService();
    }

    // test de suppression de toute les données, nécessaire pour nettoyer la bdd de tests à la fin
    public function testDeleteAll()
    {
        $contactService = new ContactService();
        $contactService->deleteAllContact();
    }


    public function testCreationContact()
    {
        $contactService = new ContactService();
        $contactService->createContact("pascal","victor");
        //du principe que id_pascal=2
        if($contactService->searchContact(2))
        {
            throw new Exception("l'utilisateur a bien ete cree");
        }
        else
        {
            throw new Exception("lutilisateur na pas ete cree");
        }
    }

    public function testSearchContact()
    {
        $contactService = new ContactService();
        $contactService->searchContact(2);
    }

    public function testModifyContact()
    {
        $contactService = new ContactService();
        $contactService->createContact(2,"pascal","victor");
    }

    public function testDeleteContact()
    {
        $contactService = new ContactService();
        $contactService->deleteContact(2);
    }

}
