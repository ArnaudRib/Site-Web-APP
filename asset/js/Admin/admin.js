function displayAdd(){
  var AddBlock=document.getElementById('Add'); //lel
  var boutonADD=document.getElementById('boutonADD');
  var boutonRemove=document.getElementById('boutonREMOVE');
  boutonADD.classList.toggle('hidden');
  boutonRemove.classList.toggle('hidden');
  AddBlock.classList.toggle('hiddensize');
}

/* pour les sports */
var file=document.querySelectorAll(".files");
for (var i = 0; i < file.length; i++) {
  var img=document.querySelectorAll(".classImage")[i];
  (function (img){ //WTF ?!?!
    file[i].onchange = function () {
      var reader = new FileReader();
      reader.onload = function (e) {
        img.src = e.target.result;
      };
      reader.readAsDataURL(this.files[0]);
    };
  })(img);
}


function modalinfo(e){
  var i=e.id;
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);

  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible");
}


function closeModalInfo(e){
  var i=e.id;
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);
  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible");
}

function modalSuppr(e){
  var i=e.id;
  var modal=document.querySelector('#modalsuppr'+i);
  var insidemodal=document.querySelector('#insideModalSuppr'+i);

  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible");
}


function closeModalSuppr(e){
  var i=e.id;
  var modal=document.querySelector('#modalsuppr'+i);
  var insidemodal=document.querySelector('#insideModalSuppr'+i);
  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible");
}

function modaldelete(e){

}
