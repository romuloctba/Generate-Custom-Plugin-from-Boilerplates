const glob = require('glob');
const fs = require('fs');
const rimraf = require('rimraf');
const ncp = require('ncp');
const each = require('async/each');

var settings = require('../.DEFAULT_SETTINGS');

var lsByGlob = (src, callback) => glob(src+'/**/**', callback);
const escapeRegExp = (str) => {
    return str.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}

const handleError = (where, error) =>{
    if (error) console.error('Error at '+where+' : ', error);
}

const init = (newSettings) => lsByGlob(settings.templatePath, (err, files) => {
    handleError('getDirectories', err);
    if (newSettings) settings = newSettings;
    return generateFromTemplate(files);
});

const copyToDist = (files) => {
    return ncp(settings.templatePath, settings.dist, err => {
        handleError('copyToDist', err);
        return translatePathsWithVars(files);
    });
};

const translateVars = (originalString) => {
    settings.variables.forEach(variable => {
        originalString = originalString.replace(new RegExp(escapeRegExp(variable), 'g'), settings.variableValues[variable]);
        return;
    });
    return originalString;
}

const createDistFolder = (cb) => rimraf(settings.dist, cb);

const generateFromTemplate = (templateFiles) => {
    createDistFolder(err => {
        handleError('generateFromTemplate error ', err);
        fs.mkdirSync(settings.dist);
        return copyToDist(templateFiles);
    });
};

const translatePathsWithVars = (files) => {
    const pathsWithVars = files.filter(path => path.indexOf('${') > -1)
        .map(str => str.replace(settings.templatePath, settings.dist));
    
    const translatedPaths = pathsWithVars.map(renamePathWithVar);
    lsByGlob(settings.dist, (err, files) => {
        each(files, replaceFileVariables, err => {
            handleError('translatePathsWithVars', err);
        })
    });
}

const renamePathWithVar = path => {
    const newPath = translateVars(path);
    fs.renameSync(path, newPath);
    return newPath;
}

const replaceFileVariables = (file, cb) => {
    if (fs.lstatSync(file).isDirectory()) {
        return cb();
    }
    const contents = fs.readFileSync(file).toString();
    fs.writeFileSync(file, translateVars(contents));
    console.log('Replaced file variables for ', file.replace(settings.templatePath, settings.dist));
    return cb();
}

module.exports = init;