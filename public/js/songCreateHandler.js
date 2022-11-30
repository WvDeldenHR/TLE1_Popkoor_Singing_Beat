//get file input field and section where the options are going to be placed
let input = document.getElementById('filesSongs');
let fileInputType = document.getElementById('inputField songFiles');
let currentlySelected = [];

//Select options
let selectOptionsText = [
    'Liedtekst',
    'Liedtekst Nederlands',
    'Bladmuziek',
    'Koorregie'
];
let selectOptionsValueText = [
    'path_song_text',
    'path_song_text_dutch',
    'path_sheets',
    'path_directions'
];

let selectOptionsSong = [
    'Nummer',
    'Nummer Instrumentaal',
    'Nummer Solo',
    'Nummer Hoog 1',
    'Nummer Hoog 2',
    'Nummer Hoog-Midden 1',
    'Nummer Hoog-Midden 2',
    'Nummer Laag-Midden 1',
    'Nummer Laag-Midden 2',
    'Nummer Laag 1',
    'Nummer Laag 2'
];
let selectOptionsValueSong = [
    'path_track',
    'path_track_instrumental',
    'path_track_solo',
    'path_track_soprano_1',
    'path_track_soprano_2',
    'path_track_contralto_1',
    'path_track_contralto_2',
    'path_track_tenor_1',
    'path_track_tenor_2',
    'path_track_bass_1',
    'path_track_bass_2'
];

let selectOptionsPicture = [
    'Albumhoes'
];
let selectOptionsValuePicture = [
    'path_cover_art',
];

//add event listener to the file input field
input.addEventListener('change', addElementsToForm);

function addElementsToForm(event) {
    //Empty screen
    fileInputType.innerHTML = '';

    let filesArray = Array.from(event.target.files)
    for (let i = 0; i < filesArray.length; i++) {

        //Create base elements, these are the same across all form inputs
        let baseFormDiv = document.createElement('div')
        baseFormDiv.className = 'mb-3';
        let baseSelectInput = document.createElement('select')
        baseSelectInput.className = 'form-control form-select'
        baseSelectInput.addEventListener('click', removeOptionHandler)
        let label = document.createElement('label');
        label.className = 'form-label';

        //Create label from filename
        label.innerHTML = filesArray[i].name

        //Add name to select Field
        baseSelectInput.name = 'files.' + i;

        //Add label to base form div
        baseFormDiv.appendChild(label);

        //Add empty option to elements
        let option = document.createElement("option");
        option.value = '';
        option.text = '';
        baseSelectInput.appendChild(option);

        let fileName = filesArray[i].name
        let extension = filesArray[i].name.substring(fileName.lastIndexOf('.') + 1);

        console.log(extension)

        if (extension === 'pdf') {
            for (let i = 0; i < selectOptionsText.length; i++) {
                let option = document.createElement("option");
                option.value = selectOptionsValueText[i];
                option.text = selectOptionsText[i];
                baseSelectInput.appendChild(option);

                //Add select to base form div
                baseFormDiv.appendChild(baseSelectInput);
            }
        } else if (extension === 'jpg' || extension === 'jpeg' || extension === 'png' || extension === 'bmp' || extension === 'gif') {
            for (let i = 0; i < selectOptionsPicture.length; i++) {
                let option = document.createElement("option");
                option.value = selectOptionsValuePicture[i];
                option.text = selectOptionsPicture[i];
                baseSelectInput.appendChild(option);

                //Add select to base form div
                baseFormDiv.appendChild(baseSelectInput);
            }
        } else if (extension === 'mp3' || extension === 'wav' || extension === 'aac') {
            for (let i = 0; i < selectOptionsSong.length; i++) {
                let option = document.createElement("option");
                option.value = selectOptionsValueSong[i];
                option.text = selectOptionsSong[i];
                baseSelectInput.appendChild(option);

                //Add select to base form div
                baseFormDiv.appendChild(baseSelectInput);
            }
        } else {
            let p = document.createElement("p");
            p.innerHTML = 'Het bestandtype van ' + filesArray[i].name + ' wordt niet ondersteund. Wij ondersteunen: pdf, jpg, png, bmp, gif. mp3, wav en aac bestanden.'
            baseFormDiv.appendChild(p);
        }

        fileInputType.appendChild(baseFormDiv)
    }
}

function removeOptionHandler(event) {
    if (event.target.tagName === 'OPTION') {
        let selectArray = Array.from(event.target.parentElement.parentElement.parentElement.children)

        for (let selectDiv of selectArray) {
            for (let elementsSelectDiv of selectDiv.children) {
                if (elementsSelectDiv.tagName === 'SELECT') {
                    for (let elementOption of elementsSelectDiv.children) {
                        if (elementOption !== event.target && elementOption.value === event.target.value) {
                            elementOption.setAttribute('hidden', '')
                        }
                        else if (elementOption.value !== event.target.value) {
                            elementOption.removeAttribute('hidden')
                        }
                    }
                }
            }
        }
    }
}
