@extends('layouts.app')

@section('content')


<div class="container pt100 pb100">
				<div class="row">

					<!-- CONTACT DETAILS -->
					<div class="col-md-4 col-md-offset-1">

						<h3 class="title title-tooltip">Contact Us</h3>

						<p class="small mb40">If you have any question please let us know.</p>

						<div class="contact-info">
							<a href="#">
								<b>Mail:</b> hafiz@casico.com
							</a>
							<a href="#">
								<b>Address:</b> Mall Thamrin City, lt 3A Blok H38-05, Jakarta Pusat
							</a>
							<a href="#">
								<b>Phone:</b> +62 823-8346-0094
							</a>
						</div>

					</div>
					<!-- /CONTACT DETAILS -->

					<!-- CONTACT FORM -->
					<div class="col-md-6">

						<div class="contact-message"></div>

						<form id="contact" action="php/contact.php">
							<input name="name" id="name" type="text" placeholder="Name:" required autocomplete="off">
							<input name="email" id="email" type="email" placeholder="Email:" required autocomplete="off">
							<textarea name="message" id="message" placeholder="Message:" required rows="4"></textarea>
							<input type="submit" id="submit" value="send" class="button outline">
						</form>

					</div>
					<!-- /CONTACT FORM -->

				</div>
			</div>

<script type="text/javascript">
</script>

@endsection
