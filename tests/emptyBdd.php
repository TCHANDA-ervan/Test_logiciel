<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use __DIR__.'/../src/contacts.php';

$contacts = new contactService();
$contacts->init('contactsTest.sqlite');
$contacts->deleteAllContact();
