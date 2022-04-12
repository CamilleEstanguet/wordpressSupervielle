<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'supervielle' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Cx@|@q3AH@!&FQ#B{#<N$NLO]+o}p!7VS={h9*F6~{1a DQ}}s&|:k/Jsax|^v:<' );
define( 'SECURE_AUTH_KEY',  '_Q]eN10,=4j<92-VX&x5m,9F:)Me,[Aev<~Mr7j=L+dDGQmTmqhsy&X/il5$n9Bn' );
define( 'LOGGED_IN_KEY',    'S5&2lmB`q07qmuw5:R&Bm>hyH;9DL_.4JfH/wa@y$1a]Es~}}YvU{ b@(aSb&j/g' );
define( 'NONCE_KEY',        '+b8ZINW6=|nL|x}`f?tky}j&NCUlp6x 0/).?51q.qS#4?Mua^cgeg<HET>0R3}A' );
define( 'AUTH_SALT',        ' %2S 4VS6iu1k3_qa%:MA|[!zljP*%P?$!bk{<q;ka*o]s0*DYsz[Yg#c&hmtLt9' );
define( 'SECURE_AUTH_SALT', 'B|f&E29nuMg0=Mpw~l+Z3GiJe*.yAqX*ag{I}hL!k6.Yj6R5{= 3N/XW+s))UNpR' );
define( 'LOGGED_IN_SALT',   '[yXBH*=hlm{m=!TDiet!~#]Zgpfg(hRj8w~oc/y v$!04H.wSie cOMz8UD 5MYQ' );
define( 'NONCE_SALT',       'A?>@8dgGnDHWo~9Qzfis<7gHq;}Nb;=(^6a?i^E$^x.*~WTl[0TS#5njkGgF7l_^' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
