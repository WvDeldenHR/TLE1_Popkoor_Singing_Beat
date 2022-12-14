if (document.getElementById("FilePDF")) {


let pdfSRC = document.getElementById("FilePDF").href;
console.log(pdfSRC);
let pdfjsLib = window['pdfjs-dist/build/pdf'];
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';
let pdfDoc = null;
let scale = 1; //Set Scale for Zoom.
let resolution = IsMobile() ? 1.5 : 1; //Set Resolution as per Desktop and Mobile.

document.addEventListener('load', LoadPdfFromUrl(pdfSRC))

function LoadPdfFromUrl(url) {
    //Read PDF from URL.
    pdfjsLib.getDocument(url).promise.then(function (pdfDoc_) {
        pdfDoc = pdfDoc_;

        //Reference the Container DIV.
        let pdf_container = document.getElementById("pdf_container");
        pdf_container.style.display = "block";
        pdf_container.style.height = IsMobile() ? "1200px" : "820px";

        //Loop and render all pages.
        for (let i = 1; i <= pdfDoc.numPages; i++) {
            RenderPage(pdf_container, i);
        }
    });
};

function RenderPage(pdf_container, num) {
    pdfDoc.getPage(num).then(function (page) {
        //Create Canvas element and append to the Container DIV.
        let canvas = document.createElement('canvas');
        canvas.id = 'pdf-' + num;
        ctx = canvas.getContext('2d');
        pdf_container.appendChild(canvas);

        //Create and add empty DIV to add SPACE between pages.
        let spacer = document.createElement("div");
        spacer.style.height = "20px";
        pdf_container.appendChild(spacer);

        //Set the Canvas dimensions using ViewPort and Scale.
        let viewport = page.getViewport({scale: scale});
        canvas.height = resolution * viewport.height;
        canvas.width = resolution * viewport.width;

        //Render the PDF page.
        let renderContext = {
            canvasContext: ctx,
            viewport: viewport,
            transform: [resolution, 0, 0, resolution, 0, 0]
        };

        page.render(renderContext);
    });
};

function IsMobile() {
    let r = new RegExp("Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini");
    return r.test(navigator.userAgent);
}}
