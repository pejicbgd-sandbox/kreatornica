function Member(data){
var self = this;
data = data || {};
self.name = ko.observable(data.name || 'No name');
self.entryDate = ko.observable(data.entryDate || new Date().toLocaleDateString());
self.bio = ko.observable (data.bio || 'Some dummy text!!!');
self.eMail = ko.observable (data.eMail || 'somemail@gmail.com');
self.phone = ko.observable (data.phone || 'No phone number to show');

/*self.isEditMode = ko.observable(false)*/
};


function MemberViewModel(){
   var self = this;
   self.members = ko.observableArray([]);
   self.memberToEdit = ko.observable();
   
   self.addMember = function() {
	self.members.push(new Member())
   }
   
   self.removeMember = function(member){
	self.members.remove(member);
   }
   
   self.editMember = function(member){
     self.members.data(member);   
   }
   
   /*self.toggleEdit = function(member){	
   
		member.isEditMode(!member.isEditMode());
   }*/
   
   self.memberToEdit = function (member){
	      self.members.data(member);
	   
    }
  }

 // Funkcija za ispis clana
/*function memberName(name){
  var self = this;
  self.name = name;
  
}
 
function MemberViewModel(){
   var self = this;
   
   // Promenljivi podaci
   self.members = ko.observableArray([
       new NewMember("Pavel Vereski", self.entryDate, 
	                 "gjwghwogowgwogow", "pavelvereski", "458-444"),
       
   ]);

   //DODAVANJE NOVOG CLANA
   self.addMember = function(){
        self.member.push(new memberNew ());   
   }
   self.removeMember = function(member){ self.member.remove(remove) }   
} */


ko.applyBindings(new MemberViewModel());




