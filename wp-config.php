<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'gerenciamento');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e/]lwy>]&)%,?Z~WAS]>iZws:X+!R1M<bOn,)4C8uEO#8P=hCAJX=`fmJE:)QBd_');
define('SECURE_AUTH_KEY',  'J,f/3aao;aB8kv^[zH}~<lcWtjpf#=KU}gksyi`J8K`sEn@:*>bY{kjF*3JVNwz>');
define('LOGGED_IN_KEY',    ',H*!Sc/3-06:wl8UT2y|iY;?ldun@h%8C}on@kBlxdIpirjgg>xs(X{fmXE|*Y3x');
define('NONCE_KEY',        'DKcHNMJ$1f=lhB!2hh+x[^dR7]tNZ{7?=+L8wm$#%%9`^II?@~H*+}q8Ql fp1`4');
define('AUTH_SALT',        'uV4moB_Bic;AIf*y)V4kOld6/w!pd, }EL^Py6`}&a^7p3mb2yG.wZI5*+0k7Fjk');
define('SECURE_AUTH_SALT', 'MPmLI9V*AllU`l2|g}bF>HosD-/(]W~E3KW;VeMp`1vi|c] .tMf[jX:G2DZkq!C');
define('LOGGED_IN_SALT',   '9NPs~%EW2!3HtB$K8?+^Q)FgqP%^rw+~iqMe1FY M1g.$5`l_G*W)#b1@N,&!*{b');
define('NONCE_SALT',       'e`A<h`}s3Q EGcb}urO%EOm<m/$8j[_.aJv+a^q3e22xh;>`bo2B!su>j.Ee9waw');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
