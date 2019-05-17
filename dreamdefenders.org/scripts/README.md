# Sync Script

Syncing Bedrock-based WordPress environments with WP-CLI aliases and `rsync`.

## Installation

Create a new `scripts/` directory in your Bedrock directory (`site/`) and place the sync script inside of there.

Make sure that `sync.sh` is executable (`chmod u+x sync.sh`).

## Configuration

Edit the variables at the top of `sync.sh` to match the settings for your environments:

* `DEVDIR` — Local path to uploads directory
* `DEVSITE` — Local dev URL
* `PRODDIR` — `user@hostname:/path/to/uploads/`
* `PRODSITE` — Production URL
* `STAGDIR` — `user@hostname:/path/to/uploads/`
* `STAGSITE` — Staging URL

The Kinsta version of the script is slightly different:

* `REMOTEDIR` — `user@hostname:/www/example_123/public/shared/uploads/`
* `PRODPORT` — Production port
* `STAGPORT` — Staging port

### WP-CLI aliases

WP-CLI aliases must be properly setup in order for the sync script to work. Open `wp-cli.yml` and setup the aliases for your environments.

#### Trellis WP-CLI aliases

```yml
# site/wp-cli.yml
path: web/wp

@development:
  ssh: vagrant@example.test/srv/www/example.com/current
@staging:
  ssh: web@staging.example.com/srv/www/example.com/current
@production:
  ssh: web@example.com/srv/www/example.com/current
```

Test the aliases to make sure they're working:

```sh
$ wp @development
$ wp @staging
$ wp @production
```

#### Trellis + Kinsta WP-CLI aliases

```yml
# site/wp-cli.yml
path: web/wp

@development:
  ssh: vagrant@example.test/srv/www/example.com/current
@staging:
  ssh: example@1.2.3.4:54321/www/example_123/public/current/web
@production:
  ssh: example@1.2.3.4:12345/www/example_123/public/current/web
```

### `.gitignore`

Open `.gitignore` in your Bedrock directory (`site/`) and add the following:

```
# WP-CLI
*_development*.sql
```

When you sync down to your local development environment a database backup is performed with `wp db export`. This helps you safely recover your database if you accidentally sync, and by making this modification to `.gitignore` you're ensuring that your local database export doesn't accidentally get commited to your git repository.

### Slack notification

Uncomment the lines near the end of the script if you'd like to enable the Slack notification for when the sync directory is up or horizontal.

Make sure to [create a new incoming webhook](https://api.slack.com/incoming-webhooks) and updating the URL in the script, as well as the channel.

## Usage

If your local development environment is a VM, don't run the sync script from inside of the VM — run it on your host machine.

Navigate to the `site/scripts/` directory to use the sync script.

Possible sync directions:

```sh
# Sync production down to development
$ ./sync.sh production development

# Sync staging down to development
$ ./sync.sh staging development

# Sync development up to producton
$ ./sync.sh development production

# Sync development up to staging
$ ./sync.sh development staging

# Sync production to staging
$ ./sync.sh production staging

# Sync staging to production
$ ./sync.sh staging production
```

### Local development without VM (Valet, etc.)

The `--local` flag can be passed at the end of the arguments to skip using WP-CLI aliases for development. This means that you can use the sync script on a local development setup such as Valet.

```sh
# Sync production down to development
$ ./sync.sh production development --local
```

## Troubleshooting

### Unable to connect to development

Make sure that your local development setup is up and running.

### Unable to connect to production or staging

Make sure that you're able to successfully connect with a SSH connection with the same details configured for the same WP-CLI alias.

If your SSH connection doesn't fail, make sure WordPress is first already installed.

## Support

[Shoot me an email](mailto:ben@roots.io) with any issues you run into.

You can re-download the latest version by visiting [https://roots.io/product-links/](https://roots.io/product-links/).
