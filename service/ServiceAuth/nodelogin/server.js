const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios');

const app = express();
const PORT = 7009;

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Endpoint to check server status
app.get('/status', (req, res) => {
  res.status(200).send('Server is running');
});

// Login route
app.post('/login', async (req, res) => {
  try {
    // Send login request to database to verify credentials
    const { email, password } = req.body;
    
    // Example: Validate credentials against your database
    const user = await User.findOne({ email });

    if (!user || !user.isValidPassword(password)) {
      return res.status(401).send('Email or password is incorrect');
    }

    // Redirect to admin page if login is successful
    res.redirect('/admin/home');
  } catch (error) {
    // Handle login error
    console.error('Error during login:', error);
    res.status(500).send('Internal Server Error');
  }
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
