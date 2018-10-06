# 📖 Wordfinder
A small web service that performs word finding tasks!

Includes functionality which will take a collection of letters (a-z) and return any words that can be built from the given letters.

## 👷‍♂️ Requirements
+ Docker (ver: `18.06.1+`)
+ PHP (ver: `7.0+`)

## 🛠 Setup

### 🎻 Development Setup - Composer

To resolve the local dev dependencies, the following command can be run from the base directory of the project:

```bash
$> make configure
```

This will install composer and resolve all development dependencies required.

### 🐳 Build - Docker Image

The following command run from the base project directory will build and tag a `wordfinder:latest` docker image:

```bash
$> make install
```

## 📝 Tests

To run the entire suite (both unit and API integration tests) run the following command from the base project directory:

```bash
$> make test
```

### Running Test Suite (Unit)

**IMPORTANT: The unit test `make` task has been provided. It is run within a Docker container to save the hassle of bootstrapping your local environment to include the [Phalcon installation](https://docs.phalconphp.com/en/3.3/installation)**

To run the test suite locally, execute the following command from the base project directory:

```bash
$> make test-unit
```

### Running Test Suite (API Integration)

To run the api test suite locally, execute the following command from the base project directory:

```bash
$> make test-api
```

This will bootstrap and run a docker instance of Wordfinder and hit the locally running instance located at `http://localhost:8080` from your host machine