@extends('layouts.app')

@section('title', 'Mon Compte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-header">Ajouter ma première addresse</div>

                <div class="card-body">
                    <div class="position-relative overflow-hidden">
                        <p class="lead">Bienvenue sur votre compte. Ici, vous pouvez gérer toutes vos informations personnelles et vos commandes.</p>
                        <form>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Email</label>
                              @if(auth()->user())
                              <input type="email" class="form-control" value="{{ auth()->user()->email }}" id="email" placeholder="Email">
                              @else
                              <input type="email" class="form-control" id="email" placeholder="Email">
                              @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputState">Pays</label>
                              <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputCity">Ville</label>
                              <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="phone">Téléphone</label>
                              <input type="phone" class="form-control" id="phone">
                            </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                  <label for="message">Information supplémentaire</label>
                                  <textarea name="message" id="message" rows="6" class="form-control"></textarea>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion" id="address">
                <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Mes addresses
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#address">
                      <div class="card-body">
                        <p class="lead">Voici les commandes que vous avez passées depuis la création de votre compte.</p>
                        <div class="alert alert-primary my-4" role="alert">
                          Vous n'avez pas passé de commande ! <a href="#" class="alert-link">Commencez dès maintenant </a>.
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Information personnelle</div>
                <div class="card-body">
                    <div class="position-relative overflow-hidden">
                        <p class="lead">Assurez-vous de mettre à jour vos informations personnelles si elles ont changé.</p>
                        <form>
                            <div class="form-group">
                                Titre sociale : 
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                  <label class="form-check-label" for="inlineCheckbox1">Monsieur</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                  <label class="form-check-label" for="inlineCheckbox2">Madame/Mademoiselle</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom complet</label>
                                @if(auth()->user())
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" id="name" placeholder="Tapez votre nom complet">
                                @else
                                <input type="text" class="form-control" id="name" placeholder="Tapez votre nom complet">
                                @endif
                            </div>
                              <div class="form-group">
                                <label for="email">Addresse Email</label>
                                @if(auth()->user())
                                  <input type="email" class="form-control" value="{{ auth()->user()->email }}" id="email" placeholder="Email">
                                  @else
                                  <input type="email" class="form-control" id="email" placeholder="Tapez votre addresse email">
                                @endif
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="day">Jour</label>
                                  <select id="day" class="form-control">
                                    <option selected>1</option>
                                    <option>...</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="month">Mois</label>
                                  <select id="month" class="form-control">
                                    <option selected>Janvier</option>
                                    <option>Février</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="year">Année</label>
                                  <select id="year" class="form-control">
                                    <option selected>1990</option>
                                    <option>...</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="password-current">Mot de passe actuel</label>
                                    @if(auth()->user())
                                      <input type="password" class="form-control" value="{{ auth()->user()->password }}" id="password" placeholder="Mot de passe actuel">
                                      @else
                                      <input type="password" id="password-current" class="form-control" placeholder="Mot de passe actuel">
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="new-password">Nouveau mot de passe</label>
                                  <input type="password" id="new-password" class="form-control" placeholder="Nouveau mot de passe">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password-confirm">Confirmé mot de passe</label>
                                  <input type="password" id="password-confirm" class="form-control" placeholder="Nouveau mot de passe">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    Inscrivez-vous à notre newsletter
                                  </label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                    Recevez des offres spéciales de nos partenaires
                                  </label>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
