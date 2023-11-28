// script.js

function validateForm() {
    // Get all checkbox groups by name
    var groups = ['objectif', 'jours', 'heures'];
    var groupNames = {};
  
    // Iterate through checkboxes and check if at least one is checked in each group
    for (var i = 0; i < groups.length; i++) {
      var groupName = groups[i];
      var checkboxes = document.querySelectorAll('input[name="' + groupName + '"]');
      var isGroupChecked = Array.from(checkboxes).some(function (checkbox) {
        return checkbox.checked;
      });
  
      if (!isGroupChecked) {
        alert('Veuillez sélectionner au moins une option dans chaque groupe.');
        return false;
      }
    }
  
    // If all groups have at least one checkbox checked, allow form submission
    return true;
  }
  