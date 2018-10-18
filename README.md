# Sualko.Version
This package makes the version of `Neos.Neos` and `Neos.Flow` available as public REST API.

## Installation
Download and copy this package to `Packages/Application/` inside your flow installation and add the following to your `Routs.yaml`.

```
- name: 'Version Route'
  uriPattern: 'version'
  defaults:
    '@format': 'json'
    '@package': 'Sualko.Version'
    '@controller': 'Standard'
```

You should now be able to get the versions as JSON string from `https://YOUR_DOMAIN/version`. If you like to change the path, just change the `uriPattern` above.

## Security consideration
Some people are believing that hiding versions is improving security, but [security through obscurity](https://en.wikipedia.org/wiki/Security_through_obscurity) is never a good idea. For example Alfred Charles Hobbs showed this already in 1851. If you still don't want to make this information public, just choose a long random string as `uriPattern`.

## Contributing
Just open a issue or pull request. We welcome every contribution.