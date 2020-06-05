
## PHP, databaser och versionshantering
  
# Projekt i grupp – IK Svalan
  * Emil
  * Oscar
  * Tilda
  * Victor
# Mål: Att bygga upp en webbplats för en idrottsförening.

# Syfte: Med laravel som verktyg ska ni bygga upp en fullskalig webbplats för IK Svalan, där medlemmar kan logga in och administratörer kan administrera datan bakom webbplatsen.

# Deadline: Torsdag 18 juni kl 12:00

# Betygskriterier för G
[ ] Tillämpar PHP-programmering, inkl. aktuella ramverk, ex. Laravel och Luna
[ ] Skapar kopplingar till SQL-databaser
[ ] Behärskar databashantering i PHP
[ ] Skapar webbformulär
[ ] Hanterar API:er och dataflöden på webben baserade på t ex REST
[ ] Exporterar och importerar CSV-data
[ ] Publicerar PHP-applikationer
[ ] Konfigurerar en webbserver
[ ] Behärskar felhantering
[ ] Löser sammansatta problem inom programmering med PHP
[ ] Väljer lämpliga tekniska lösningar med PHP och SQL
[ ] Programmerar objektorienterat med PHP
[ ] Programmerar PHP-applikationer i webbmiljö
[ ] Använder SQL för att skapa databasdrivna webbapplikationer
[ ] Publicerar webbplatser
[ ] Skapar databasdrivna webbapplikationer

# Betygskriterier för VG
[ ] Självständigt hantera API:er och dataflöden på webben baserade på t ex REST
[ ] Självständigt publicera webbplatser
[ ] Självständigt skapa databasdrivna webbapplikationer

# Litteratur
• Utdelade dokument på ITHSdistans

## Uppgift
Skapa en webbplats till IK Svalan för såväl administratörer som vanliga medlemmar. En administratör
ska kunna hantera medlemmar, sektioner och lag enligt full CRUD och REST API (dvs skapa, läsa,
editera och ta bort dem).
En medlem ska ha egenskaperna firstname, lastname, birthday, email och member_fee.
Medlemsavgiften är 300 kr/år för juniorer (- 18 år) och 500 för övriga.
De tre sektionerna som finns är fotboll, skidor och gymnastik.
En medlem kan vara med i flera aktiviteter (exempelvis spela fotboll i F08 och åka skidor i
motionsgruppen).
En medlem som loggar in och är medlem i ett lag/träningsgrupp ska kunna se vilka medlemmar som
ingår i den, men ska inte kunna ändra något förutom sin egen emailadress.
En medlem som loggar in men inte ingår i något lag ska bara se information om sig själv.
En besökare som inte loggar in ska bara se webbplatsens startsida. På den ska det finnas information
om vilka sektioner som finns, och hur många lag/träningsgrupper det finns per sektion.
En administratör ska vid inloggning kunna se hur många medlemmar som betalt medlemsavgiften,
hur många som inte gjort det samt totalsummorna för dessa båda grupper.
• Använd migration-filer för att skapa databastabellerna.
• Låt webbplatsens URIer följa standard för REST API
• Låt webbplatsen följa MVC-modellen
• Använd seeders och factories för att skapa medlemmar och lag. 100 medlemmar och 15
lag/träningsgrupper.

# Arbetsmetod
Gruppmedlemmarna ska skapa någon form av digital mötesplats (zoom, teams, webex, discord etc)
och skicka en länk till hans.andersson@zocom.se så snart den är ordnad. Detta för att utbildaren ska
kunna ”hälsa på” under arbetets gång och stämma av.

# Inlämning
Ett zippat filpaket samt länk till github-repo eller dylikt ska laddas upp till ITHS-distans.
Redovisning
Muntlig redovisning via webex torsdag 18 juni kl 13:00. Räkna med 15 minuter per grupp. I och med
att alla grupper gör samma projekt, så kommer fokus för redovisningarna att variera enligt följande

# schema:
Redovisar Fokus på Ställer frågor efteråt
Humleblomster Hantering av lag och aktiviteter Käringtand
Käringtand Hantering av medlem Prästkrage
Prästkrage Auth Skogsklöver
Skogsklöver Migration & seeds Humleblomster