<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                                class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand nav-color" href="index.php?gestion=accueil">Accueil </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="nav-color" href="#" class="dropdown-toggle nav-color" data-toggle="dropdown">Réunions<strong
                                        class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.php?gestion=reunion&time=encours">Réunions en cours</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="index.php?gestion=reunion&time=passe">Réunions passées</a>
                                </li>
                            </ul>
                        </li>
                        {if $smarty.session.typeUser == 'acc'}
                            <li>
                                <a class="nav-color" href="index.php?gestion=porteur">Porteurs de projet</a>
                            </li>
                        {/if}

                        <li>
                            <a class="nav-color" href="index.php?gestion=accompagnateur">Accompagnateurs</a>
                        </li>

                        {if $smarty.session.typeUser == 'acc'}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle nav-color" data-toggle="dropdown">Paramètres<strong
                                            class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?gestion=lieu">Lieux</a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="index.php?gestion=activite">Activités</a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="index.php?gestion=type">Types</a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="index.php?gestion=statut">Statut</a>
                                    </li>

                                </ul>
                            </li>
                        {/if}
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" id="little_profil">
                            {if $smarty.session.typeUser eq 'acc'}
                                <a href="#" class="dropdown-toggle nav-color" data-toggle="dropdown">
                                    <img src="{$smarty.session.img}"
                                         style="width: 30px; height: 30px; border: solid 1px white; border-radius: 50%"><strong class="caret"></strong>
                                </a>
                            {else}
                                <a href="#" class="dropdown-toggle nav-color" data-toggle="dropdown">Espace
                                    personnel<strong
                                            class="caret"></strong></a>
                            {/if}

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.php?gestion=authentification&action=deconnexion">{$deconnexion}</a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    {if $smarty.session.typeUser eq 'acc'}
                                        <a href="index.php?gestion=accompagnateur&action=profil">Profil</a>
                                    {else}
                                        <a href="index.php?gestion=porteur&action=profil">Profil</a>
                                    {/if}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>