var noOfSkill = document.getElementById("noOfSkill");
noOfSkill.addEventListener("keyup", () => {
  document.getElementById("addSkillTable").innerHTML = " ";
  for (let i = 0; i < noOfSkill.value; i++) {
    var tr = document.createElement("tr");
    let count = i;
    tr.innerHTML = `<td><label>Skill Name</label><br><input placeholder='${
      1 + count
    }'   name='skill'></td><td><label>Skill Fees</label><br><input  value='0'   name='skillFees'></td>`;
    document.getElementById("addSkillTable").append(tr);
  }
});
