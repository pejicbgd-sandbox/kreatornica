<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Članovi - Izmeni sekciju</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Pocetna</a></li>
						<li><i class="fa fa-laptop"></i>Članovi</li>						  	
					</ol>
				</div>
			</div>
<section class="panel">
  <div class="panel-body">
	  <form class="form-horizontal " method="get">
		  <div class="form-group">
		    
			  <label class="control-label col-lg-2" for="inputSuccess">Izaberi jezik: </label>
			  <div class="col-lg-10">
			  <select class="form-control m-bot15">
					  <option>Srpski</option>
					  <option>Slovački</option>
					  <option>Engleski</option>
				  </select>
				  
				  <input class="form-control input-lg m-bot15" type="text" placeholder="Izmeni naslov">
				  <input class="form-control m-bot15" type="text" placeholder="Izmeni podnaslov">

			  </div>
		  </div>
	  </form>
  </div>
  
 </section>
 
<div class="row">
  <div class="col-lg-12">
	  <section class="panel">
		  <header class="panel-heading">
			  Lista članova
		  </header>
		  
		  <table class="table table-striped table-advance table-hover">
		   <tbody>
			  <tr>
				 <th><i class="icon_profile"></i> Ime i prezime</th>
				 <th><i class="icon_calendar"></i> Datum unosa</th>
				 <th><i class="icon_document_alt"></i> Biografija</th>
				 <th><i class="icon_mail_alt"></i> E-mail</th>
				 <th><i class="icon_mobile"></i> Telefon</th>
				 <th><i class="icon_cogs"></i> Uredi</th>
			  </tr>
			  <!-- ko foreach: members -->			  
			  <tr>
			  
				 <td data-bind="text: name"></td>
				 <td data-bind="text: entryDate"></td>
				 <td data-bind="text: bio" style=" max-width: 100px; overflow: hidden; text-overflow: ellipsis;  white-space: nowrap;"></td>
				 <td data-bind="text: eMail"></td>
				 <td data-bind="text: phone"></td>
				 <td>				 
				  <div class="btn-group">
					  <a href="#member-update" data-toggle="modal" class="btn btn-primary" data-bind="click: $root.editMember"><i class="icon_plus_alt2"></i></a>
					  <a class="btn btn-danger" href="#" data-bind="click: $root.removeMember"><i class="icon_close_alt2"></i></a>
				  </div>
				  </td>
			 </tr>
			 <!-- /ko -->
                                          
		   </tbody>
		</table>
	  </section>
  </div>
</div>
<!-- page end-->
			  
			  
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="member-update" class="modal fade">
  <div class="modal-dialog">
	  <div class="modal-content" data-bind="with: $root.memberToEdit">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			  <h4 class="modal-title">Izmeni/Ubaci podatke o članu</h4>
		  </div>
		  <div class="modal-body">
		  
		   <label class="control-label col-lg-2" for="inputSuccess"><span style="margin-left: -20px;">Izaberi jezik:</label>
			  <div class="col-lg-10" >
			  <select class="form-control m-bot15">
					  <option>Srpski</option>
					  <option>Slovački</option>
					  <option>Engleski</option>
				  </select>
			</div>

			  <form role="form">
				  <div class="form-group">
					  <label for="exampleInputFullName">Ime i Prezime</label>
					  <input type="text" class="form-control" id="exampleInputFullName" placeholder="Ime i Prezime" data-bind="value: name">
				  </div>
				  
				  <div class="form-group">
					  <label for="exampleInputEmail">E-mail</label>
					  <input type="text" class="form-control" id="exampleInputEmail" placeholder="E-mail" data-bind="value: eMail">
				  </div> 
				  
				  <div class="form-group">
					  <label for="exampleInputPhone">Telefon</label>
					  <input type="text" class="form-control" id="exampleInputPhone" placeholder="Telefon" data-bind="value: phone">
				  </div>
				  
				  <!-- CKEditor -->
					<div class="col-lg-12">
						<section class="panel">
						 <header class="panel-heading">
							 Izmeni sadržaj
						 </header>
					<div class="panel-body">
						<div class="form">
									
						 <form action="#" class="form-horizontal">
							 <div class="form-group">
								
									 <div class="col-sm-10">
										 <textarea class="form-control ckeditor" name="editor1" rows="6" data-bind="value: bio"></textarea>
											</div>
										</div>
									</form>
								</div>
							</div>
						</section>
					</div>
				  
				  <div class="form-group" style="">
					  <p>Datum unosa: <input type="text" id="datepicker" /></p>
				  </div>
				  <div class="form-group">
					  <label for="exampleInputFile">Unesi sliku</label>
					  <input type="file" id="exampleInputFile3">
					  <p class="help-block">Example block-level help text here.</p>
				  </div>
				 
				  <button type="submit" class="btn btn-primary">Pošalji</button>
			  </form>
		  </div>
	  </div>
  </div>
</div>

<button class="btn btn-primary" type="submit">Ažuriraj sekciju</button>
<button class="btn btn-primary" type="submit" style="margin-right: 8%; float:right;" data-bind="click: $root.addMember">Dodaj člana</button>
 
 

			  
	
		       