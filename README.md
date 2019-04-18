# TorqueWHMCS (forked from monero integrations)
A WHMCS Payment Gateway for accepting Torque

## Dependencies
This plugin is rather simple but there are a few things that need to be set up beforehand.

* A web server! Ideally with the most recent versions of PHP and mysql

* The Torque wallet-cli and Torque wallet-rpc tools found [here](https://github.com/contribute-torque/Torque/releases)

* [WHMCS](https://www.whmcs.com/)
This Torque plugin is a payment gateway for WHMCS

## Step 1: Activating the plugin
* Downloading: First of all, you will need to download the plugin.  If you wish, you can also download the latest source code from GitHub. This can be done with the command `git clone https://github.com/contribute-torque/torquewhmcs.git` or can be downloaded as a zip file from the GitHub web page.


* Put the plugin in the correct directory: You will need to copy `torque.php` and the folder named `torque` from this repo/unzipped release into the WHMCS Payment Gateways directory. This can be found at `whmcspath/modules/gateways/`

* Activate the plugin from the WHMCS admin panel: Once you login to the admin panel in WHMCS, click on "Setup -> Payments -> Payment Gateways". Click on "All Payment Gateways". Then click on the "Torque" gateway to activate it.

* Enter a Module Secret Key.  This can be any random text and is used to verify payments.  

* Enter the values for Wallet RPC Host, Wallet RPC Port, Username, and Password (these are from torque-wallet-rpc below).  Optionally enter a percentage discount for all invoices paid via Torque.

* Optionally install the addon module to disable WHMCS fraud checking when using Torque. You will need to copy the folder `addons/torqueenable/` from this repo/unzipped release into the WHMCS Addons directory. This can be found at `whmcspath/addons/`.  

* Activate the Torque Enabler addon from the WHMCS admin panel: Click on "Setup -> Addon Modules". Find "Torque Enabler" and click on "Activate". Click "Configure" and choose the Torque Payment Gateway in the drop down list. Check the box for "Enable checking for payment method by module" and click "Save Changes".

## Step 2: Get a Torque daemon to connect to

### Option 1: Running a full node yourself

To do this: start the Torque daemon on your server and leave it running in the background. This can be accomplished by running `./torqued` inside your Torque downloads folder. The first time that you start your node, the Torque daemon will download and sync the entire Torque blockchain. This can take several hours and is best done on a machine with at least 4GB of ram, an SSD hard drive (with at least 15GB of free space), and a high speed internet connection.

## Step 3: Setup your Torque wallet-rpc

* Setup a Torque wallet using the torque-wallet-cli tool.

* Start the Wallet RPC and leave it running in the background. This can be accomplished by running `./torque-wallet-rpc --rpc-bind-port 20189 --rpc-login username:password --log-level 2 --wallet-file /path/walletfile` where "username:password" is the username and password that you want to use, separated by a colon and  "/path/walletfile" is your actual wallet file.



## Info on server authentication
It is recommended that you specify a username/password with your wallet rpc. This can be done by starting your wallet rpc with `torque-wallet-rpc --rpc-bind-port 20189 --rpc-login username:password --wallet-file /path/walletfile` where "username:password" is the username and password that you want to use, separated by a colon. Alternatively, you can use the `--restricted-rpc` flag with the wallet rpc like so `./torque-wallet-rpc --testnet --rpc-bind-port 20189 --restricted-rpc --wallet-file wallet/path`.

## Donating Monero Integrations
XMR Address : `44krVcL6TPkANjpFwS2GWvg1kJhTrN7y9heVeQiDJ3rP8iGbCd5GeA4f3c2NKYHC1R4mCgnW7dsUUUae2m9GiNBGT4T8s2X`
