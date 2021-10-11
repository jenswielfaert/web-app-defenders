# Goal
*describe how this web app will (evantually) earn money or make the world a better place*

Having a blog allows you to express yourself, as well as inspire and educate others on a variety of topics. It's one of the most effective methods to establish an online presence and share your expertise with people around the world. However, starting a blog can be very overwhelming. As a result, our team will develop a GDPR-compliant, secure blogging platform for people to share their expertise and thoughts. The web app will have a user-friendly interface that allows users to register or log in, create blog entries, add photos, and like and comment on other users' postings. In addition, one of the most useful features of our web app will be the ability to collaborate on blogs up to more than one person. As the group's administrator, you will be able to invite other members to contribute to the post, which makes our app an excellent tool for any business.

# Acceptance criteria
*how do we know that the goals have been reached?*

[BEVEILIGING]

# HTTPS:
- [ ] Gebruik van HTTPS
- [ ] Er zal niet kunnen gesurfd worden naar de URL door te kopieren.
- [ ] HSTS preload list.
- [ ] Elk respons moet een Strict-Transport-Security header bevatten
- [ ] DNS CAA encryt toepassing.
- [ ] Domain krijgt een A op de website van 'ssllabs.com/ssltest'.

# SING UP:
- [ ] Een user geeft een e-mail adres in en een wachtwoord.
- [ ] Een wachtwoord kan bestaan uit de <printable> ASCII Karakters.
- [ ] Een wachtwoord moet minstens 7 Karakters lang zijn.
- [ ] Een user moet een bestaande e-mail adres ingeven.
- [ ] Een Wachtwoord kan worden gekopieerd en geplakt.

# API:
- [ ] HIBP api wordt gebruikt voor het weigeren van wachtwoorden die meer dan 300 keer als gebreached gemarkeerd zijn.

# SIGN IN:
- [ ] Een user kan pas inloggen als hij zijn e-mail adres heeft bevestigd door te bewijzen dat het zijn e-mail adres is.
- [ ] Bij het fout invoeren van een wachtwoord moet de user 60seconden wachten.
- [ ] Als de user ingelogd is kan hij bovenaan rechts zijn profiel foto zien.
- [ ] Er wordt gevraagd aan de user om de noodzakelijke cookies te accepteren.

# USER RECHTEN:
- [ ] Een user kan zijn profiel bekijken.
- [ ] Een user kan zijn gegevens aanpassen.
- [ ] Een user kan zijn account verwijderen
- [ ] Een user kan zijn gegevens exporteren en downloaden in een .CSV file

# PERSOONLIJKE GEGEVENS EN BESCHERMING:
- [ ] GDPR wordt toegepast aan de website
- [ ] Website zal conform zijn met de privacy wetgeving.
- [ ] Een user kan de privacyverklaring altijd raadplegen.
- [ ] Onderaan op de website op elke pagina zal er de privacyverklaringen staan.
- [ ] Een user is op de hoogte van het gebruik van noodzakelijke cookies.
- [ ] Een user kan contact nemen zaols vermeld in de privacyverklaring.

# BLOG:
- [ ] Een user kan gewoon zijn eigen posts aanpassen of verwijderen.
- [ ] Een user kan andere posts Liken.

  
# Threat model
*describe your threat model. One or more architectural diagram expected. Also a list of the principal threats and what you will do about them*
# Deployment
*minimally, this section contains a public URL of the app. A description of how your software is deployed is a bonus. Do you do this manually, or did you manage to automate? Have you taken into account the security of your deployment process?*
# *you may want further sections*
*especially if the use of your application is not self-evident*
