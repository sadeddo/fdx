<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/product/');

        // Vérifie que la réponse est un succès
        $this->assertResponseIsSuccessful();

        // Vérifie que le titre "Mes produits" est bien présent dans la page
        $this->assertSelectorTextContains('h1', 'Mes produits');

        // Vérifie que la table des produits est présente
        $this->assertCount(1, $crawler->filter('table.table'));

        // Optionnel : vérifiez que le lien pour créer un nouveau produit est présent
        $this->assertSelectorExists('a[href="' . $client->getContainer()->get('router')->generate('app_product_new') . '"]');
    }
}
