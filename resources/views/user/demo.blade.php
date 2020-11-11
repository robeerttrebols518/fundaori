@extends('sitio.master')
@section('title', 'DEMOS')
@section('content')




<div class="page-title-bg indent-header-1 page-main-content m-bot-40">
	<div class="container">
		<div class="page-title-container">
			<div class="row">
				<div class="col-md-12">
					<h2>CUENTA</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a class="a-invert" href="index.html">CUENTA</a></li>
						<li class="active">REGISTRO</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- CONTACT ONE PAGE FOOTER -->
<div class="title-lines-container m-top-min-35">
			<div class="container">
					
				<div class="row">
                    
					<div class="col-md-12 m-bot-20">
						<!-- TITLE -->
						<div class="title-lines">
							<div class="title-lines-white-bg"></div>  
							<div class="title-block">
								FORMULARIO
							</div>
						</div>
						<!-- CONTACT FORM -->
						<div class="col-md-12">
                            <div class="container">					
                                <div class="row">
                                    <div class="col-md-4 m-bot-30">   
                                            <div class="contact-form-container no-before">
                                                <form id="contact-form" action="php/contact-form.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Your name *</label>
                                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" placeholder="NAME" required>
                                                        </div>
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Your email address *</label>
                                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" placeholder="EMAIL" required>
                                                        </div>
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Message *</label>
                                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="7" class="form-control" name="message" id="message" placeholder="MESSAGE" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                    
                                    <div class="col-md-4 m-bot-30">   
                                            <div class="contact-form-container no-before">
                                                <form id="contact-form" action="php/contact-form.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Your name *</label>
                                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" placeholder="NAME" required>
                                                        </div>
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Your email address *</label>
                                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" placeholder="EMAIL" required>
                                                        </div>
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Message *</label>
                                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="7" class="form-control" name="message" id="message" placeholder="MESSAGE" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                    <div class="col-md-4 m-bot-30">                                    
                                        <div class="m-top-min-10 ">
                                            <div class="contact-form-container no-before">
                                                <form id="contact-form" action="php/contact-form.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Your name *</label>
                                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" placeholder="NAME" required>
                                                        </div>
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Your email address *</label>
                                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" placeholder="EMAIL" required>
                                                        </div>
                                                        <div class="col-md-12 m-bot-15">
                                                            <label>Message *</label>
                                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="7" class="form-control" name="message" id="message" placeholder="MESSAGE" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- CONTACT INFO -->	
                                    
                                </div>
                                
                            </div>
						</div>
					</div>
                    
		

				</div>
				
			</div>
		</div>

@endsection