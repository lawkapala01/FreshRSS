<?php

class FreshRSS_Factory {

	public static function createFeedDao($username = null) {
		return new FreshRSS_FeedDAO($username);
	}

	public static function createEntryDao($username = null) {
		$conf = Minz_Configuration::get('system');
		switch ($conf->db['type']) {
			case 'sqlite':
				return new FreshRSS_EntryDAOSQLite($username);
			case 'pgsql':
				return new FreshRSS_EntryDAOPGSQL($username);
			default:
				return new FreshRSS_EntryDAO($username);
		}
	}

	public static function createStatsDAO($username = null) {
		$conf = Minz_Configuration::get('system');
		switch ($conf->db['type']) {
			case 'sqlite':
				return new FreshRSS_StatsDAOSQLite($username);
			case 'pgsql':
				return new FreshRSS_StatsDAOPGSQL($username);
			default:
				return new FreshRSS_StatsDAO($username);
		}
	}

	public static function createDatabaseDAO($username = null) {
		$conf = Minz_Configuration::get('system');
		switch ($conf->db['type']) {
			case 'sqlite':
				return new FreshRSS_DatabaseDAOSQLite($username);
			case 'pgsql':
				return new FreshRSS_DatabaseDAOPGSQL($username);
			default:
				return new FreshRSS_DatabaseDAO($username);
		}
	}

}
