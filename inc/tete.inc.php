<div id ="header">
  <ul id="portal-siteactions">

    <li id="siteaction-plan_acces"><a href="http://www.uha.fr/planacces" accesskey="" title="Plan d'acc�s">Plan d'acc&egrave;s</a></li>
    <li id="siteaction-contact-uha"><a href="http://www.uha.fr/contact-uha" accesskey="" title="Contact">Contact</a></li>
    <li id="siteaction-accueil"><a href="http://www.uha.fr/" accesskey="" title="Accueil">Accueil</a></li>

</ul>
 
</div>
<div id="emptyspace">
<div id="info_utilisateur"><?php   if( isset($_SESSION['isLogged'])===true){ echo "Bienvenue ".$_SESSION["nom"]." ".$_SESSION['prenom'];}?></div><?php if(isset($_SESSION['isLogged'])===true){ echo '<div id="deconnexion"><a href="../connexion/deconnexion.php" >deconnexion</a></div>';}else{ echo '<div id="connexion"><a href="../connexion">login</a></div>';}?>
</div>
<div id ="lowerpage">
  <table id ="lowerpage-columns">
  <tbody>
      <tr>
	     <td id="lowerpage-column-one" style="width:30%">
		    <dl class="portlet" id="portlet-navigation-tree">
               <dt class="portletHeader">
                  <span class="portletTopLeft"></span>
        <a href="index.php" class="tile">Navigation</a>
       
        <span class="portletTopRight"></span>
    </dt>

    <dd class="portletItem lastItem">
        <ul class="portletNavigationTree navTreeLevel0">

            <li class="navTreeItem">
                
                   <div class="visualIcon contenttype-plone-site">
                       <a class="navTreeCurrentItem visualIconPadding" href="../" title="">
                       Accueil
                       
                       </a>
                   </div>
                
            </li>
 <li class="navTreeItem visualNoMarker">

    

    <div class="visualIcon contenttype-folder">
        
        <a href="../Inscription/" class="state-published visualIconPadding" title="">Inscription</a>
        
    </div>

    
    
</li>           



<li class="navTreeItem visualNoMarker">

    

    <div class="visualIcon contenttype-folder">
        
        <a href="../contrat_pedagogique/" class="state-published visualIconPadding" title="">Contrat pedagogique</a>
        
    </div>

    
    
</li>


<li class="navTreeItem visualNoMarker">

    

    <div class="visualIcon contenttype-folder">
        
        <a href="../projet_pedagogique/" class="state-published visualIconPadding" title="">Projet Pedagogique</a>
        
    </div>

    
    
</li>


<li class="navTreeItem visualNoMarker">

    

    <div class="visualIcon contenttype-folder">
        
        <a href="../guide_activite/" class="state-published visualIconPadding" title="">Emplois du temps</a>
        
    </div>

    
    
</li>

<li class="navTreeItem visualNoMarker">

    

    <div class="visualIcon contenttype-folder">
        
        <a href="../guide_activite/" class="state-published visualIconPadding" title="">Guide des Activites</a>
        
    </div>

    
    
</li>




        </ul>
        <span class="portletBottomLeft"></span>
        <span class="portletBottomRight"></span>
    </dd>
</dl>
</td>