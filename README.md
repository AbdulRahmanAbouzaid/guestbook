<h1><center>Guestbook | PHP Challenge</center></h1>

<h2> Tools :-
<h3> 1- Backend:- </h3>
<ul>
  <li> As mentioned in the challenge you sent, I used only PHP:-
    <ul>
      <li>By reusing an OOP-MCV structure i developed before</li>
      <li>And then adding the required logic of challenge</li>
    </ul>
  </li>
  <li> Mysql database
    <ul>
      <li>Schema Design consists ot two tables [users and Messages] </li>
      <li>Messages table used to store messages and replies that are differentiated by parent_id column </li>
      <li>If the parent_id equal to 0, it's a message otherwise it's a reply</li>
    </ul>
  </li>
</ul>

<h3> 2- Frontend:- </h3>
<ul>
  <li> I used templates based on css and bootstrap for the UI </li>
  <li> I wrote simple JS code for handling show/hide update form of messages and replies </li>
</ul>

<h2>Setting up the project:- </h2>
<ul>
  <li> Of course you need to install wamp or xamp </li>
  <li> clone the project at the server directory</li>
  <li> import the db file named "guestbook.sql"</li>
  <li> You can run the project using  "php -S localhost:8000" command </li>
</ul>
