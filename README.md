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

In `.env.local` add the following variable:

```dotenv
GAZE_PRIVATE_KEY_CONTENTS="-----BEGIN RSA PRIVATE KEY-----
MIIJKQIBAAKCAgEA2IAilwuZwX+wV0y9jpuhwtwNIXo6W1kocr1Dwg3sK7xNAbg8
...
```

Add you own `private.key` contents to this file.
