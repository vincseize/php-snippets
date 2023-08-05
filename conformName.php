
function replaceSpecialCharsWithHyphen_fromArray($inputArray) {
    $specialCharsPattern = '/[^\p{L}\p{N}]+/u';
    $outputArray = [];

    foreach ($inputArray as $input) {
        $output = preg_replace($specialCharsPattern, '-', $input);
        $outputArray[] = $output;
    }

    return $outputArray;
}

function replaceSpecialCharsWithHyphen($inputString) {
    $specialCharsPattern = '/[^\p{L}\p{N}]+/u';
    $outputString = preg_replace($specialCharsPattern, '-', $inputString);
    return $outputString;
}

function replaceWhitespaceWithChar($inputString, $replacement = '-') {
    $outputString = preg_replace('/\s+/', $replacement, $inputString);
    return $outputString;
}

function removeAccents($inputString) {
    $normalizedString = Normalizer::normalize($inputString, Normalizer::FORM_D);
    $outputString = preg_replace('/\p{Mn}+/u', '', $normalizedString);
    return $outputString;
}

function removeAccentsFromFiles($folderPath) {
    $directoryIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderPath));

    foreach ($directoryIterator as $fileInfo) {
        if ($fileInfo->isFile()) {
            $originalFilePath = $fileInfo->getPathname();
            $originalFileName = $fileInfo->getFilename();
            $newFileName = removeAccents($originalFileName);
            
            if ($newFileName !== $originalFileName) {
                $newFilePath = $fileInfo->getPath() . DIRECTORY_SEPARATOR . $newFileName;
                rename($originalFilePath, $newFilePath);
            }
        }
    }
}

function replaceSpacesWithHyphensInFiles($folderPath) {
    $directoryIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderPath));

    foreach ($directoryIterator as $fileInfo) {
        if ($fileInfo->isFile()) {
            $originalFilePath = $fileInfo->getPathname();
            $originalFileName = $fileInfo->getFilename();
            $newFileName = str_replace(' ', '-', $originalFileName);
            
            if ($newFileName !== $originalFileName) {
                $newFilePath = $fileInfo->getPath() . DIRECTORY_SEPARATOR . $newFileName;
                rename($originalFilePath, $newFilePath);
            }
        }
    }
}

function replaceSpecialCharsWithHyphensInFiles($folderPath) {
    $directoryIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderPath));

    $specialCharsPattern = '/[^\p{L}\p{N}\s]+/u';

    foreach ($directoryIterator as $fileInfo) {
        if ($fileInfo->isFile()) {
            $originalFilePath = $fileInfo->getPathname();
            $originalFileName = $fileInfo->getFilename();
            $newFileName = preg_replace($specialCharsPattern, '-', $originalFileName);
            
            if ($newFileName !== $originalFileName) {
                $newFilePath = $fileInfo->getPath() . DIRECTORY_SEPARATOR . $newFileName;
                rename($originalFilePath, $newFilePath);
            }
        }
    }
}

function replaceStringInFiles($folderPath, $searchString, $replaceString) {
    $directoryIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderPath));

    foreach ($directoryIterator as $fileInfo) {
        if ($fileInfo->isFile()) {
            $originalFilePath = $fileInfo->getPathname();
            $originalFileName = $fileInfo->getFilename();
            $newFileName = str_replace($searchString, $replaceString, $originalFileName);
            
            if ($newFileName !== $originalFileName) {
                $newFilePath = $fileInfo->getPath() . DIRECTORY_SEPARATOR . $newFileName;
                rename($originalFilePath, $newFilePath);
            }
        }
    }
}

function replaceStringInFilenames($folderPath, $searchString, $replaceString) {
    $directoryIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderPath));

    foreach ($directoryIterator as $fileInfo) {
        if ($fileInfo->isFile()) {
            $originalFilePath = $fileInfo->getPathname();
            $originalFileName = $fileInfo->getFilename();
            $originalFileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

            $newFileName = str_replace($searchString, $replaceString, $originalFileName);
            $newFileNameWithExtension = $newFileName . '.' . $originalFileExtension;
            
            if ($newFileName !== $originalFileName) {
                $newFilePath = $fileInfo->getPath() . DIRECTORY_SEPARATOR . $newFileNameWithExtension;
                rename($originalFilePath, $newFilePath);
            }
        }
    }
}

// ---------------------------------- DEBUG ----------------------------

// removeAccentsFromFiles(PATH_TRACKS);
// replaceSpacesWithHyphensInFiles(PATH_TRACKS);
// replaceSpecialCharsWithHyphensInFiles(PATH_TRACKS);

// $searchString = 'Episode-';
// $replaceString = '';
// replaceStringInFilenames(PATH_TRACKS, $searchString, $replaceString);
