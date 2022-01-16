@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <!-- Page Header -->
  <header class="masthead" style="background-image: url({{ asset('img/contact-bg.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contactez-nous</h1>
            <span class="subheading">Vous avez une question ? Nous avons une réponse.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p>Voulez-vous entrer en contact? Remplissez le formulaire ci-dessous pour nous envoyer un message et nous vous répondrons dans les meilleurs délais!</p>
            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <form name="sentMessage" class="needs-validation" novalidate>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Nom Complet</label>
                  <input type="text" class="form-control" placeholder="Votre nom complet" id="name" required>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Address Email</label>
                  <input type="email" class="form-control" placeholder="Votre mail" id="email" required>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Téléphone</label>
                  <input type="tel" class="form-control" placeholder="Votre numéro de téléphone" id="phone" required>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Message</label>
                  <textarea rows="5" class="form-control" placeholder="Votre message" id="message" required></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection