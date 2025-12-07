const AdmZip = require("adm-zip");
const fs = require("fs");
const path = require("path");

const THEME_NAME = "drdevaccesible";
const outputFile = `${THEME_NAME}.zip`;

const zip = new AdmZip();

function addFolderToZip(folderPath, zipInstance, root = "") {
  const items = fs.readdirSync(folderPath);

  items.forEach(item => {
    const fullPath = path.join(folderPath, item);
    const relPath = path.join(root, item);
    const stats = fs.statSync(fullPath);

    // exclude certain files and directories
    if (
      item === "node_modules" ||
      item === "build" ||
      item === "package.json" ||
      item === "package-lock.json" ||
      item === ".gitignore" ||
      item === "zip.js"
    ) {
      return;
    }

    if (stats.isDirectory()) {
      zipInstance.addFile(relPath + "/", Buffer.alloc(0));
      addFolderToZip(fullPath, zipInstance, relPath);
    } else {
      zipInstance.addLocalFile(fullPath, root);
    }
  });
}

addFolderToZip("./", zip);
zip.writeZip(outputFile);

console.log(`\n🎉 Tema empaquetado correctamente: ${outputFile}\n`);

