import express from "express";
import multer from "multer";
import fs from "fs";
import axios from "axios";
import dotenv from "dotenv";
dotenv.config();

const app = express();

const upload = multer({
    dest: "uploads/",
    limits: { fileSize: 20 * 1024 * 1024 } // 20MB LIMIT
});

const GITHUB_TOKEN = process.env.GITHUB_TOKEN;
const GITHUB_USER = process.env.GITHUB_USER;
const GITHUB_REPO = process.env.GITHUB_REPO;

// Upload route
app.post("/upload", upload.single("fileToUpload"), async (req, res) => {
    try {
        // Multer rejected the file?
        if (!req.file) {
            return res.status(400).send("No file or file too large (max 20MB).");
        }

        const filePath = req.file.path;
        const originalName = req.file.originalname;
        const fileBuffer = fs.readFileSync(filePath);
        const base64File = fileBuffer.toString("base64");

        const gitPath = `uploads/${Date.now()}_${originalName}`;

        const githubRes = await axios.put(
            `https://api.github.com/repos/${GITHUB_USER}/${GITHUB_REPO}/contents/${gitPath}`,
            {
                message: `Upload file: ${originalName}`,
                content: base64File,
            },
            {
                headers: {
                    Authorization: `Bearer ${GITHUB_TOKEN}`,
                    "Content-Type": "application/json",
                },
            }
        );

        fs.unlinkSync(filePath);

        const fileURL = githubRes.data.content.download_url;

        res.send(`
            <h2>Upload Successful</h2>
            <p>Your file is stored here:</p>
            <a href="${fileURL}" target="_blank">${fileURL}</a>
        `);

    } catch (err) {
        console.error(err);

        // Handle Multer file-too-large error
        if (err.code === "LIMIT_FILE_SIZE") {
            return res.status(400).send("File too large! Max file size is **20MB**.");
        }

        res.status(500).send("Upload failed.");
    }
});

app.listen(3000, () => console.log("Server running on http://localhost:3000"));