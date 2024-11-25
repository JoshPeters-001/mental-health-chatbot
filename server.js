const express = require("express");
const bodyParser = require("body-parser");
const cors = require("cors");
const dialogflow = require("@google-cloud/dialogflow");

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.json());
app.use(cors());

// Dialogflow Setup
const PROJECT_ID = "mentalhealthchatbot-441501"; // Replace with your Dialogflow project ID
const sessionClient = new dialogflow.SessionsClient({
  keyFilename: "C:/key/dialogflow_key.json", // Path to your service account key
});

// Route for chatbot interaction
app.post("/chat", async (req, res) => {
  const { message, sessionId } = req.body;

  if (!message) {
    return res.status(400).json({ error: "Message is required" });
  }

  const sessionPath = sessionClient.projectAgentSessionPath(PROJECT_ID, sessionId);

  const request = {
    session: sessionPath,
    queryInput: {
      text: {
        text: message,
        languageCode: "en",
      },
    },
  };

  try {
    const responses = await sessionClient.detectIntent(request);
    const result = responses[0].queryResult;

    // Debugging: Log the response from Dialogflow
    console.log("Dialogflow response:", result);

    res.json({
      response: result.fulfillmentText || "I'm not sure how to respond to that.",
    });
  } catch (error) {
    console.error("ERROR:", error);
    res.status(500).json({ error: "Failed to process the request" });
  }
});

// Start server
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
