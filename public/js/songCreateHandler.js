
//Get file input field and section where the options are going to be placed
let input = document.getElementById('filesSongs');
let parentOfSelectContainer = document.getElementById('inputField songFiles');

//Set global class names for reused HTML elements
//Classes that are needed for a function, such as 'selectFiles' or 'optionFIles', are added separately.
let classesSelectContainer = 'mb-3';
let classesSelectElement = 'form-control form-select';
let classesFormLabel = 'form-label';
let classesErrorFiletype = '';

//Select options
const selectOptionsText = {
    path_song_text: "Liedtekst",
    path_song_text_dutch: "Liedtekst Nederlands",
    path_sheets: "Bladmuziek",
    path_directions: "Koorregie"
};

const selectOptionsSong = {
    path_track: "Nummer",
    path_track_instrumental: "Nummer Instrumentaal",
    path_track_solo: "Nummer Solo",
    path_track_soprano_1: "Nummer Hoog 1",
    path_track_soprano_2: "Nummer Hoog 2",
    path_track_contralto_1: "Nummer Hoog-Midden 1",
    path_track_contralto_2: "Nummer Hoog-Midden 2",
    path_track_tenor_1: "Nummer Laag-Midden 1",
    path_track_tenor_2: "Nummer Laag-Midden 2",
    path_track_bass_1: "Nummer Laag 1",
    path_track_bass_2: "Nummer Laag 2"
};

const selectOptionsPicture = {
    path_cover_art: "Albumhoes"
};


//add event listener to the file input field
input.addEventListener('change', addElementsToForm);

function addElementsToForm(event) {
    //Empty the container, before adding new elements
    parentOfSelectContainer.innerHTML = '';

    //Create array of uploaded files
    let filesArray = Array.from(event.target.files)

    //Loop though each uploaded file, create a select element and add it to the container
    for (let i = 0; i < filesArray.length; i++) {

        //Create base HTML elements, these are the same across all form inputs
        let selectContainer = document.createElement('div');
        selectContainer.className = classesSelectContainer;
        let selectElement = document.createElement('select');
        selectElement.className = classesSelectElement;

        //This class is added separately, since it's part of a function
        selectElement.classList.add('selectFiles');

        //Add event listener: If the select input has changed, hide or unhide a option
        selectElement.addEventListener('change', hiddenOptionHandler);

        //Create label of filename
        let formLabel = document.createElement('label');
        formLabel.className = classesFormLabel;
        formLabel.innerHTML = filesArray[i].name

        //Add name to select Field
        selectElement.name = 'files.' + i;

        //Add label to base form div
        selectContainer.appendChild(formLabel);

        //Add empty option to elements
        let option = document.createElement("option");
        option.value = '';
        option.text = '';
        selectElement.appendChild(option);

        Object.keys(selectOptionsText).forEach(function callback(value, index) {
        });


        //Check the file's extension and create add the correct options to select
        //For example: img_20221103114533.jpg is an image, so only the options of selectOptionsPicture are added
        if (isPdf(filesArray[i].name)) {
            for (const key in selectOptionsText) {
                let value = selectOptionsText[key]
                createOption(key, value, selectElement, selectContainer);
            }
        } else if (isImage(filesArray[i].name)) {
            for (const key in selectOptionsPicture) {
                let value = selectOptionsPicture[key.toString()]
                createOption(key, value, selectElement, selectContainer);
            }
        } else if (isAudio(filesArray[i].name)) {
            for (const key in selectOptionsSong) {
                let value = selectOptionsSong[key]
                createOption(key, value, selectElement, selectContainer);
            }
        }
        //If the file extension doesn't match any of the criteria, show an error message
        else {
            let p = document.createElement("p");
            p.innerHTML = 'Het bestandtype van ' + filesArray[i].name + ' wordt niet ondersteund. Wij ondersteunen: pdf, jpg, png, bmp, gif. mp3, wav en aac bestanden.'
            p.className = classesErrorFiletype;
            selectContainer.appendChild(p);
        }

        //Add the finished Select container to the form
        parentOfSelectContainer.appendChild(selectContainer)
    }
}

function hiddenOptionHandler(event) {
    //Get all select and option element
    let selectElements = document.getElementsByClassName('selectFiles');
    let optionElements = document.getElementsByClassName('optionFIles');

    //Create array for every option that's currently selected
    let currentlySelected = [];

    //Loop though each select element and check their current value
    //If it's not empty add them to the currentlySelected array
    for (let selectElement of selectElements) {
        if (selectElement.value !== '') {
            currentlySelected.push(selectElement.value);
        }
    }

    //Loop through each option element to check whether it should be hidden or not
    for (let optionElement of optionElements) {
        //Check if current select element isn't the same as the changed select element
        //Secondly check if another select element has this option selected
        //Lastly make sure that the parent element of the option hasn't selected that option
        //If all of this is true, hide option
        //Else if this option is not selected by any element, then remove the hidden attribute
        if (optionElement.parentElement !== event.target && currentlySelected.includes(optionElement.value) && optionElement.parentElement.value !== optionElement.value) {
            optionElement.setAttribute('hidden', '')
        } else if (!currentlySelected.includes(optionElement.value)) {
            optionElement.removeAttribute('hidden')
        }
    }
}

//Function for creating options and adding them to select
function createOption(value, text, selectElement, selectContainer) {
    //Create option element and add the correct value and text
    let option = document.createElement("option");
    option.value = value;
    option.text = text;
    option.className = 'optionFIles'

    //Add the option to the select field
    selectElement.appendChild(option);

    //Add updated select element to the container
    selectContainer.appendChild(selectElement);
}
