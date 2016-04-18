# PHP Lessen

## Inleiding

In de lessen gedurende periode 3 leren we hoe, gericht op de opdracht om een forum
te bouwen, met PHP een dergelijke applicatie kunnen bouwen. We gaan iedere les een
probleem aanpakken en uitwerken.

## Lessen

1. Aanmaken van een database m.b.v. PHPMyAdmin (**AF**)
2. Aanmaken van een users tabel (**AF**)
   Gegevens:
   * **id**   int(11)       PRIMARY KEY AUTO_INCREMENT
   * username varchar(30)
   * password varchar(255)  *sha1 encoded*
   * email    varchar(255)
2. Leren werken met databases middels de PDO bibliotheek in PHP (**AF**)
3. Hoe vertellen we andere scripts, zoals het dashboard dat er succesvol
   ingelogd is (SESSIONS)? Het dashboard mag alleen toegankelijk zijn als
   er ingelogd is, anders brengt iedere aanroep naar het dashboard de gebruiker
   weer terug naar het inlogscherm. (**AF**)
4. We leren dus wat SESSIONS zijn en hoe we deze dienen te gebruiken.(**AF**)
5. In de tabel users verwerken we een rol van een gebruiker als volgt:(**AF**)
   * role      int(1)        default 1 *(0 = Admin, 1 = User)*
6. We hebben in een eerste refactoring van de code functionaliteit uit de
   verschillende php-bestanden gehaald en in eigen php-bestanden geplaatst. Dit
   maakt het makkelijker en leesbaarder. Zo plaatsen we alle code die nodig is
   voor het werken met de database in het bestand database.php geplaatst en
   functies aangemaakt met ieder hun eigen duidelijke doel. Daarnaast ontdekken
   we dat we ook steeds weer dezelfde code moeten intikken om te verifieren of
   er ingelogd is en zo ja, welke rol een gebruiker heeft. Ook dit verzamelen we
   in een eigen php-bestanden, genaamd authentication.php.(**AF**)
7. Registratieformulier maken (**AF** op 21-03-2016)
8. Afhandeling van de registratie uitwerken in register-user.php (**AF** op 21-03-2016)
9. We merken dat we ook steeds voor alle pagina's hele grote stukken HTML moeten
   herhalen. We gaan daarom alles wederom refactoren op een manier dat we hele
   stukken HTML slechts eenmaal hoeven aan te maken en het steeds kunnen hergebruiken
   op iedere pagina.(**AF** op 29-03-2016)
10. E-mail verificatie bij registreren. Het is de bedoeling dat we pas kunnen inloggen als we ons mailadres nog niet hebben geverifieerd. (**AF** op 11-04-2016)
11. Database uitbreiden voor het forum. Welke gegevens willen we bewaren en hoe
   ziet de structuur met tabellen er dan uit. (**AF** op 11-04-2016)
12. Met testgegevens in de database leren hoe we een overzicht kunnen produceren
   van alle thema's in ons forum. Ook hoe we statistieken, zoals het totaal aantal
   reacties per thema, kunnen tonen. (**AF** op 18-04-2016)
13. Uitbouwen van onze applicatie met reacties.
14. Uitbouwen van de login beveiliging. Controlleren of iemand een admin is voor thema's aanmaken enz.
15. Uitbouwen van de mogelijkheid om een thema aan te maken als je een admin bent
16. Uitbouwen van de mogelijkheid om een onderwerp aan te maken als je bent ingelogd.
17. Uitbouwen van de mogelijkheid om een reactie te plaatsen als je bent ingelogd.
