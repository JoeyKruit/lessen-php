Les 05 - PDO en SESSIONS
===================================================================================
Middels een voorbeeld login procedure leren we gebruik maken van PDO en SESSIONS
- Na een succesvolle login worden we doorverwezen naar een dashboard.
- Bij een onjuiste login geven we een foutmelding en keren we terug naar het login
  scherm.
- We maken daarbij gebruik van bootstrap voor de vormgeving

===================================================================================
Doel:
-----
1. Aanmaken van een database m.b.v. PHPMyAdmin
2. Aanmaken van een users tabel
    Gegevens:       id          int(11) PRIMARY KEY AUTO_INCREMENT
                    username    varchar(30)
                    password    varchar(255)    sha1 encoded
                    email       varchar(255)
2. Leren werken met databases middels de PDO bibliotheek in PHP
3. Hoe vertellen we andere scripts, zoals het dashboard dat er succesvol
   ingelogd is (SESSIONS)? Het dashboard mag alleen toegankelijk zijn als
   er ingelogd is, anders brengt iedere aanroep naar het dashboard de gebruiker
   weer terug naar het inlogscherm.
4. We leren dus wat SESSIONS zijn en hoe we deze dienen te gebruiken.
