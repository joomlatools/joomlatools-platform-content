# Joomla Content Extension

## What is Joomla Content?

Joomla Content is an article management extension for the [Joomlatools Platform](https://github.com/joomlatools/joomla-platform) 
supporting content tagging and versioning.

## Requirements

- PHP 5.5 or newer
- MySQL 5

## Installation

Joomla Content can and should be installed by using [Composer](https://getcomposer.org/). 

Go to the root directory of your Joomla Platform installation using the command line and execute following command:

```
composer require joomlatools/joomla-platform-content:1.*
```

## Contributing

We appreciate any contribution to Joomla Content, whether it is related to bugs, grammar, or simply a suggestion or
improvement. We ask that any contribution follows a few simple guidelines in order to be properly received.

We follow the [GitFlow][gitflow-model] branching model, from development to release. If you are not familiar with it,
there are several guides and tutorials online to learn about it.

There are a few things you must know before submitting a pull request:

- All changes need to be made against the `develop` branch. However, it is very well appreciated and highly suggested to 
start a new feature branch from `develop` and make your changes in this new branch. This way we can just checkout your 
feature branch for testing before merging it into `develop`.
- We will not consider pull requests made directly to the `master` branch.

## License 

Joomla Content is open-source software licensed under the [GPLv3 license](https://github.com/joomlatools/joomla-platform-content/blob/master/LICENSE.txt).

[gitflow-model]: http://nvie.com/posts/a-successful-git-branching-model/

