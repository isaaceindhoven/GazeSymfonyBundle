# Gaze Symfony Bundle

This Symfony bundle can be used to integrate [Gaze](https://isaaceindhoven.github.io/GazeHub/docs/#/) easily in an Symfony application.

## Install

Install using composer:

```shell script
composer require isaac/gazesymfonybundle
```

---

Create the file `config/routes/isaac_gaze_symfony.yaml` with the following content: (This will register the `TokenController` of the bundle with the Symfony application)

```yaml
isaac_gaze_symfony:
  resource: '@ISAACGazeSymfonyBundle/config/routing.xml'
  prefix: /gaze
```

---

In `.env` add the following variable:

```dotenv
GAZEHUB_URL="http://localhost:3333"
```

(Replace `http://localhost:3333` with the url to [GazeHub](https://isaaceindhoven.github.io/GazeHub/docs/#/gazehub))

---

To store the private key in a safe way inside Symfony use the [Symfony Vault](https://symfony.com/doc/current/configuration/secrets.html). Run the following command to set the private key in a development environment:

```shell script
bin/console secrets:set GAZE_PRIVATE_KEY_CONTENTS <PATH TO KEY OR KEY CONTENT>
```

To use another key on production run the following command in the production environment to override the private key:

```shell script
bin/console secrets:set GAZE_PRIVATE_KEY_CONTENTS <PATH TO KEY OR KEY CONTENT> -e prod
bin/console secrets:decrypt-to-local --force --env=prod
```
