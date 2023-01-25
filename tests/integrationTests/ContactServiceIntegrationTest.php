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

use function PHPUnit\Framework\once;
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
        $this->assertEquals(0, $contactService->countContacts());
    }


    public function testCreationContact()
    {
        $contactService = new ContactService();
        $contactService->createContact("pascal", "victor");
        //du principe que id_pascal=2
        if ($contactService->searchContact(2)) {
             $contact = $contactService->searchContact(2);
             $this->assertEquals("pascal", $contact->getFirstName());
             $this->assertEquals("victor", $contact->getLastName());
      
        } else {
            throw new InvalidArgumentException("l'utilisateur na pas ete cree");
        }
    }

           


    public function testSearchContact()
    {
        $contactService = new ContactService();
        $result=$contactService->searchContact(2);
        $this->assertSame('Contact', get_class($result), "ne rien retourner");

    }


    public function testModifyContact()
    {
        $contactService = new ContactService();
        $contactService->createContact(2, "pascal", "victor");
        $this->assertTrue($contactService->modifyContact(2, "pascal", "victor") instanceof ContactService);
    }

    public function testDeleteContact()
    {
        $contactService = new ContactService();
        $del=$contactService->deleteContact(2);
        $this->assertSame('boolean', gettype($del), "ne rien retourner");
        

    }
    
}