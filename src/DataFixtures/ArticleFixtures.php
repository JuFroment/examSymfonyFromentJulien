<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
     return [
         CategoryFixtures::class,
         UserFixtures::class
     ];
    }

    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $article1 = new Article();
        $article1->setCategory($this->getReference(1));
        $article1->setTitre('Fabien Roussel au salon de l\'agriculture');
        $article1->setImage('https://focus.nouvelobs.com/2022/02/28/0/0/6000/3000/633/306/75/0/3592335_593489171-sipa-01063119-000001.jpg');
        $article1->setUser($this->getReference(3));
        $article1->setContenu('
Le rendez-vous était comme taillé sur-mesure. Car c’est bien une polémique sur la viande, qui doit selon lui « être accessible à tous », en dépit de la défense par les écologistes d’une réduction de sa consommation, qui fut à l’origine de la petite dynamique qui, depuis janvier, a permis au candidat communiste de recueillir environ 4 % des intentions de vote dans les sondages. C’est donc peu dire que Fabien Roussel était à l’aise, ce lundi 28 février au Salon de l’Agriculture, en s’entretenant avec des éleveurs, en dégustant à l’aveugle un vin de Bordeaux ou en s’agaçant du Nutri-Score autour d’un saucisson, avec les représentants des professionnels de la filière porcine.
Fabien Roussel, un drôle de coco

« Le maroilles de chez nous, il a une très mauvaise note avec ce système, c’est pas normal ! » s’est enflammé le député du Nord face au président d’Inaporc Thierry Meyer, qui, de son côté, a dénoncé « ces animalistes qui poussent nos jeunes à ne plus consommer de charcuterie ». Rien de plus facile pour le rouge que de déployer les axes de son programme sur la souveraineté alimentaire, entouré d’élus PCF de territoires ruraux comme le député du Puy-de-Dôme André Chassaigne. « Fabien, elle est là, la vache salers ! Viens voir, approche-toi, trente secondes ! » l’a guidé l’élu auvergnat vers une représentante de cette race bovine imposante, à la toison brune et fournie. Une claque sur la croupe, puis un baiser langoureux à même le cul de la bête : le coco Roussel n’hésite pas à cabotiner quand il s’agit de démontrer son amour du terroir.');

        $article2 = new Article();
        $article2->setCategory($this->getReference(2));
        $article2->setTitre('Un fermier Ukrainien vole un tank russe');
        $article2->setImage('https://townsquare.media/site/34/files/2022/02/attachment-Screen-Shot-2022-02-28-at-9.07.28-AM.jpg?w=1200&h=0&zc=1&s=0&a=t&q=89');
        $article2->setUser($this->getReference(3));
        $article2->setContenu('Since the war in Ukraine broke out, social media has been flooded with interesting videos which are being shared widely. One such video claims to show a farmer stealing a Russian military tank with his tractor. A man is seeing desperately running after the tank.');

        $article3 = new Article();
        $article3->setCategory($this->getReference(1));
        $article3->setTitre('Jean Luc Mélenchon explique sa position sur la Russie');
        $article3->setImage('https://www.francetvinfo.fr/pictures/N1qQgk6I_4m3HFa2sFOkJi9SDRI/0x251:3084x1985/944x531/filters:format(webp)/2022/02/26/phpEuoHF0.jpg');
        $article3->setUser($this->getReference(4));
        $article3->setContenu("Avant de quitter l'île, le candidat La France insoumise à la présidentielle a tenu un meeting samedi après-midi à Saint-Denis de la Réunion, devant un millier de personnes. Attaqué par une partie de la gauche sur une présumée complaisance à l’égard de Vladimir Poutine, Jean-Luc Mélenchon a tenté de clore le chapitre en consacrant la moitié de son discours à l’Ukraine et en justifiant ses propos antérieurs par son \"non-alignement". "Je demande qu'on cesse les caricatures\", a-t-il plaidé. 

Certes, il a bien dit que la Russie n’envahirait pas l’Ukraine : \"C'est vrai, j'ai commis une erreur, mais ce n'est pas par aveuglement.\" Il vise alors en creux Emmanuel Macron : \"Je me suis référé à ce que disaient les plus hautes autorités de mon pays et j'ai eu tort de les croire !\" ");

        $article4 = new Article();
        $article4->setCategory($this->getReference(2));
        $article4->setTitre('Encore des livres vandalisés: «On devrait lancer des smartphones!»');
        $article4->setImage('https://cdn.unitycms.io/image/ocroped/1600,1600,1000,1000,0,0/0VSTzRm0Zjg/17y_t7CMaAs9fkFxOaTb1Q.jpg');
        $article4->setUser($this->getReference(4));
        $article4->setContenu("Il y a cinq mois, lematin.ch racontait la dure vie des livres en libre-service. à Bienne. En découvrant des pages déchirées sur le trottoir, le député Mohamed Hamdaoui (Le Centre) s’était indigné. Rebelote ce week-end, dans la même cabine téléphonique transformée en bibliothèque libre d’accès, à l’arrêt des «Pinsons», sur la ligne 9 des Transports publics.

Mohamed Hamdaoui a vu des pages répandues sur la route «comme on se débarrasserait de cadavres dans une fosse commune». Les réactions n’ont pas tardé: «La destruction de livres est un autodafé pratiqué de tout temps par les systèmes dictatoriaux… Suivez mon regard…», a commenté l’écrivain et journaliste biennois Thierry Luterbacher.");

        $manager->persist($article1);
        $manager->persist($article2);
        $manager->persist($article3);
        $manager->persist($article4);

        $manager->flush();

    }
}