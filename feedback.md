## Feedback of Defenders-Team
* TONOYAN Ashot, GEZGEN Soner, NYANGUILE Tischa, ZAÏRI Daoud

# RAPPORT 2021 - https://www.digitaldreamteam.be/
*Een lijst van de problemen die we hebben gevonden op de site van DigitalDreamTeam

Site 
- Input: http://digitaldreamteam.be/ 
- Domain: digitaldreamteam.be 
- Final Url: https://digitaldreamteam.be/ 
Ip 
- 5.134.4.174 
- 2a00:1c98:1000:1211:0:2:c575:72f7 
Redirects To 
- https://digitaldreamteam.be/ 
Running On 
-Nginx 

## Problemen:
- [ ] Athentication - Register
- [ ] Athentication - Login
- [ ] /profiel - Page
- [ ] /plates - Page
- [ ] Other - Pages
- [ ] DDos – Cloudflare 
- [ ] HTTP HEADER issues
- [ ] BRUTE FORCE WEB DIRECTORIES
- [ ] BRUTE FORCE Password
- [ ] XSS injection 
- [ ] XSS injection : Using XSSer
- [ ] Cross-site scripting 
- [ ] Cookies 
- [ ] Privacy Policy
- [ ] API call (bypass)
- [ ] API call user wachtwoorden
- [ ] GDPR 

------------------------------------------------------------------------------------------------------------------------------------------------------

## Athentication - Register:
### [Acceptatiecriteria] 
*As a visitor I can register So that I can become a valid member 
    *I can navigate to a registration page 
    *I can fill in a registration form 
    *I can confirm my registration with a verification link sent by email 

### Vulnerabilities:
    - Geen vereiste Minimum Lengte voor wachtwoord 
    - Geen Suggesties voor strong Password 
    - Geen vereiste voor speciale Karakters (bv. Minimum 1 hoofdetter, 1 cijfer, 1 speciale  Karakter) 
    - Geen controle over wachtwoorden die vaak worden gebruikt en als HIBP zijn gelist 
    - Geen tweede invoer veld voor het bevestigen van een wachtwoord
    - Geen Email-formaat controle in de Invoerveld, valse email wordt geaccepteerd (ookal er geen @ is)
    - Geen verificatie link gestuurd naar email (dus geen bevestiging van bestaande mail) 

### Tools:
Manueel op de website getest.

------------------------------------------------------------------------------------------------------------------------------------------------------

## Athentication - Login:
### [Acceptatiecriteria] 
*As a member I can login So that I have access to the sharing functionalities 
    *I can navigate to a login page 
    *I can fill in a login form 
    *I can access my personal profile page 
    *I can access the sharing page 

### Problemen:
    - Geen tijdsinterval tussen meerdere mislukte inlogpogingen. 
    - Geen beperkte pogingen bij het inloggen op een account
    - Geen MFA (Multi-factor authentication) 
    - Geen blokkering van account bij mislukte inlog pogingen (dus ook geen heractivatie link via mail) 
    - (Geen ingebouwde opslaging van wachtwoord) 

### Tools:
Manueel op de website getest.

------------------------------------------------------------------------------------------------------------------------------------------------------

## Profiel, Plates, ... - Pages:
### [Acceptatiecriteria] 
*As a logged in member I can deactivate my membership So that all my data is removed from the application database. 
    *I can choose to deactivate my memberschip by clicking a button on my personal profile page. 

*As a logged in member I can contact a helpdesk So that I can pose any question I encounter while using the application.
    *I can send a message by clicking a help-button on every pageview.

### Problemen:
  - Niet mogelijk om een plate te deleten (delete-knop niet actief)

  - Niet mogelijk om te surfen van Login pagina naar Register pagina 
  - Niet mogelijk om te surfen naar Profiel pagina
  - Niet mogelijk om zijn wachtwoord te veranderen 
  - Niet mogelijk om zijn account te verwijderen (GDPR)

### Tools:
Manueel op de website getest.

------------------------------------------------------------------------------------------------------------------------------------------------------

## DDos – Cloudflare (Locust):

Ddos attack (swarming): Eerste try kwamen 50% van de requests toe. 
Na een paar minuten krijgen we 429 too many requests. Slechts 12% van requests worden vervolgens doorgevoerd. -> OK 

Name            # reqs                 # fails  |     Avg     Min     Max  Median   |   req/s failures/s 
Aggregated 30648 27246(88.90%)                  |   52731       9  161491   79000   |   17.90   15.92 

Niet prone to script injections/ man in the middle/ CSRF, bij registration wordt er een object terugegeven met sensitive data in plaintext. -> NOK 

![External Services architectuur](Link GitHub afbeelding 1)
 Ook wordt er een token meegedeeld. (nog te inspecteren) 
![External Services architectuur](Link GitHub afbeelding 2)

Geen error message bij foute invoer van register-a-plate of afname ervan

Nikto scan geeft het volgende output 
+ SSL Info: Subject:  /CN=digitaldreamteam.be 
                   Ciphers:  TLS_AES_256_GCM_SHA384 
                   Issuer:   /C=US/O=Let's Encrypt/CN=R3 
+ Start Time:         2021-12-11 12:32:32 (GMT-5) 
--------------------------------------------------------------------------- 
+ Server: nginx 
+ The anti-clickjacking X-Frame-Options header is not present. 
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS 
+ The site uses SSL and the Strict-Transport-Security HTTP header is not defined. 
+ The site uses SSL and Expect-CT header is not present. 
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type 
+ All CGI directories 'found', use '-C none' to test none 
+ The Content-Encoding header is set to "deflate" this may mean that the server is vulnerable to the BREACH attack. 

### Tools:
Software: Locust  

------------------------------------------------------------------------------------------------------------------------------------------------------

## HTTP HEADER issues - To protect your site against clickjacking attacks:

Problemen: 
  - Missing security header: Content-Security-Policy 
  - Missing security header: X-Frame-Options 
  - Missing security header: X-XSS-Protection 
  - Missing security header: X-Content-Type-Options 
  - Missing security header: Referrer-Policy 

### Tools:
https://pentest-tools.com/website-vulnerability-scanning/website-scanner

------------------------------------------------------------------------------------------------------------------------------------------------------

## BRUTE FORCE WEB DIRECTORIES:
1 - Op de afbeelding lanceren we een brute force web directories attack met sqlmap in Kali.  
2 - De tool probeert meest voorkomende webdirectories van een app te brute forcen. 
3 - Voor alle "directories krijgen we een status 200 OK Status, behalve voor de directory "assets". /Assets geeft een 301 terug. (Forbidden)  

### Tools:
 
 ------------------------------------------------------------------------------------------------------------------------------------------------------

## BRUTE FORCE Password:
1 - Met Burpsuite in Kali kan jij een HTTP(S) trafic intercepten en de payload zien.  
2 - Je kunt de payload ook aanpassen en een attack lanceren. 
3 - Op de afbeelding lanceren we een Password attack. 
4 - Hiervoor maken we gebruik van een .txt file met alle meest "common passwords" die je kunt vinden op het internet.  
Bewijs:
![External Services architectuur](Link GitHub afbeelding 1)

### Tools:

------------------------------------------------------------------------------------------------------------------------------------------------------

## XSS injection:
Op de afbeelding zien we dat de injection pogingen mislukt zijn op e login pagina. "Injections: 3 – Failed: 3" 
![External Services architectuur](Link GitHub afbeelding 1)
Bewijs:
![External Services architectuur](Link GitHub afbeelding 1)
![External Services architectuur](Link GitHub afbeelding 2)
![External Services architectuur](Link GitHub afbeelding 3)

### Tools:

------------------------------------------------------------------------------------------------------------------------------------------------------

## XSS injection - Using XSSer:

------------------------------------------------------------------------------------------------------------------------------------------------------

## Cross-site scripting:

------------------------------------------------------------------------------------------------------------------------------------------------------

## Cookies:

Problemen: 
  - Geen Cookies Alert
  - Geen banners gevonden 
  - Geen third-party domains gevonden 
  - Geen stored coukies gevonden 

### Tools:
*https://www.cookiemetrix.com/display-report/www.digitaldreamteam.be/02461beeef4eca3d738414d44d48e5f4 

------------------------------------------------------------------------------------------------------------------------------------------------------

## GDPR - Privacy Policy:
*The law requires you to inform users about what data you collect, how it's used, stored and protected
  - Geen privacy policy on website

### Tools:
Manueel op de website getest.

------------------------------------------------------------------------------------------------------------------------------------------------------

## API call (bypass):

1 - Bij de register API call kunnen wij een bearer token extracten naar de route https://plates.azurewebsites.net 
2 - Wanneer we dezelfde call via postman maken werkt deze token om ons te authorizen  
3 - Op die manier kunnen wij alle emails en informaties zien van personnen die een plate hebben geshared. 

Bewijs:
![External Services architectuur](Link GitHub afbeelding 1)
![External Services architectuur](Link GitHub afbeelding 2)
![External Services architectuur](Link GitHub afbeelding 3)
![External Services architectuur](Link GitHub afbeelding 4)

### Tools:
Kali Linux: Burpsuite Interceptor software
Postman: https://www.postman.com/ 

------------------------------------------------------------------------------------------------------------------------------------------------------

## API call user wachtwoorden:

### Problemen: 
  - Wachtwoord wordt niet geëncrypteerd tijdens de API call. Wachtwoord wordt dus in plaintext gestuurd.

### Tools:
Browser Developer Console

------------------------------------------------------------------------------------------------------------------------------------------------------


