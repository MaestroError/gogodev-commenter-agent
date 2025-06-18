# Laravel Commenter Agent

A Laravel-based application that demonstrates AI-powered comment analysis and response generation with [LarAgent](https://github.com/maestroerror/laragent) package. This project showcases how to integrate AI agents for sentiment analysis and automated response generation for product reviews.

## Features

- **Sentiment Analysis**: Automatically detects whether a review is positive or negative
- **AI-Powered Responses**: Generates contextually appropriate responses to reviews
- **Laravel Integration**: Built on the Laravel framework for robust backend functionality
- **Custom AI Agents**: Implements specialized agents for different tasks
- **Example Reviews**: Comes with sample reviews for demonstration purposes

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP 8.2 or higher
- Composer (PHP package manager)
- Node.js and npm (for frontend assets)
- An OpenAI API key or compatible LLM provider

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/gogodev-commenter-agent.git
cd gogodev-commenter-agent
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install NPM Dependencies

```bash
npm install
npm run build
```

### 4. Configure Environment

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure AI Provider

Update your `.env` file with your AI provider credentials. For OpenAI, add:

```env
OPENAI_API_KEY=your_openai_api_key
```

## Usage

### Running the Application

Start the development server:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to access the application.

### Review Management

The application comes with sample reviews that you can view and interact with. The main features include:

1. **View Reviews**: See a list of sample reviews
2. **Analyze Sentiment**: Check the sentiment (positive/negative) of each review
3. **Generate Responses**: Get AI-generated responses to reviews

### Customizing Reviews

To add or modify reviews, edit the `$comments` array in `app/Http/Controllers/ReviewsController.php`.

## AI Agents

The application includes two main AI agents:

### 1. SentimentChecker

Analyzes the sentiment of a review (positive/negative).

```php
use App\AiAgents\SentimentChecker;
// ....
$response = SentimentChecker::for('sentiment_check')->respond($comment['comment']);
dd($response['sentiment']); // true/false
```

### 2. ReplyAgent

Generates responses to reviews based on their sentiment.

```php
use App\AiAgents\ReplyAgent;
// ....
$response = ReplyAgent::for('example')->setReview($comment)->respond();
// Uses tool with review id and reply to add review to storage (as a txt file)
```

## Configuration

You can configure the AI models and behavior in `config/laragent.php`:

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced under the [MIT License](LICENSE).

## Support

For support, please open an issue in the GitHub repository.
