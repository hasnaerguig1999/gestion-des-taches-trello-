
function addTasktodo() {
  var btn = document.getElementById("todobtn");
  var form = document.getElementById("todoform");

  btn.classList.toggle("d-none");
  form.classList.toggle("d-none");

}
function addTaskdoing() {
  var btn1 = document.getElementById("doingbtn");
  var form1 = document.getElementById("doingform");

  btn1.classList.toggle("d-none");
  form1.classList.toggle("d-none");

}
function addTaskdone() {
  var btn2 = document.getElementById("donebtn");
  var form2 = document.getElementById("doneform");

  btn2.classList.toggle("d-none");
  form2.classList.toggle("d-none");

}


function addTaskb() {
  var list = document.querySelector('#item');
  var newTaskb = document.createElement('li');
  newTaskb.innerHTML = "<input>";
  list.appendChild(newTaskb);
}
function addTaskc() {
  var list = document.querySelector('#itemc');
  var newTaskc = document.createElement('li');
  newTaskc.innerHTML = "<input>";
  list.appendChild(newTaskc);
}



const createTaskForm = () => {
  // Récupérer le nombre de formulaires à créer
  let taskCount = document.getElementById("task-count").value;
  console.log(taskCount);
  // Vider les formulaires existants
  let taskForms = document.getElementById("task-forms");
  taskForms.innerHTML = "";
  // Créer autant de formulaires que spécifié
  for (let i = 0; i < taskCount; i++) {
    // let taskForm = document.createElement("form");
    let html = `
    <div class="form-group">
<br>
<select class="form-control" name="statut${i + 1}">
<option value="todo">A faire</option>
<option value="doing">En cours</option>
<option value="done">Terminer</option>
</select><br>

<label for="task_end">Date limite :</label><br>
<br><input type="date" class="form-control" name="task_end${i + 1}" >
<br>
<label>Tâche${i + 1}:</label>
<input type="text" class="form-control" placeholder="enter description" name="task_descr${i + 1}">
</div>
    `;
    console.log(html);
    // taskForm.innerHTML = ;
    taskForms.innerHTML += html;
  }
}
function addTasks() {
  // Récupérer les valeurs des formulaires
  let taskForms = document.getElementById("task-forms");
  let taskList = document.getElementById("task-list");
  for (let i = 0; i < taskForms.children.length; i++) {
    let task = taskForms.children[i].elements[0].value;
    // Vérifier si l'input est vide
    if (!task) {
      alert("Veuillez entrer une tâche valide");
      return;
    }
    // Ajouter la tâche à la liste
    let newTask = document.createElement("input");
    newTask.innerHTML = task;
    newTask.value = task;
    taskList.appendChild(newTask);
  }
  // Réinitialiser les formulaires
  taskForms.innerHTML = "";
  document.getElementById("task-count").value = "<input>";
}