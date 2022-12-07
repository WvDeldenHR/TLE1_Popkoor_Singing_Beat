function getExtension(filename) {
    let parts = filename.split('.');
    return parts[parts.length - 1];
}

function isPdf(filename) {
    let ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'pdf':
            return true;
    }
    return false;
}

function isImage(filename) {
    let ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'jpg':
        case 'gif':
        case 'bmp':
        case 'png':
            return true;
    }
    return false;
}

function isAudio(filename) {
    let ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'wav':
        case 'mp3':
        case 'ogg':
        case 'acc':
            return true;
    }
    return false;
}
