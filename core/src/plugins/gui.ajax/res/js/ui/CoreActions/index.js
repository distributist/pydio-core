/*
 * Copyright 2007-2013 Charles du Jeu - Abstrium SAS <team (at) pyd.io>
 * This file is part of Pydio.
 *
 * Pydio is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Pydio is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Pydio.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The latest code can be found at <https://pydio.com>.
 */

const Callbacks = {
    switchLanguage : require('./callbacks/switchLanguage'),
    userCreateRepository: require('./callbacks/userCreateRepository'),
    changePass: require('./callbacks/changePass'),
    launchIndexation: require('./callbacks/launchIndexation'),
    toggleBookmark: require('./callbacks/toggleBookmark'),
    clearPluginsCache: require('./callbacks/clearPluginsCache'),
    dismissUserAlert: require('./callbacks/dismissUserAlert'),
    activateDesktopNotifications: require('./callbacks/activateDesktopNotifications')
}

const Navigation = {
    splash: require('./navigation/splash'),
    up: require('./navigation/up'),
    refresh: require('./navigation/refresh'),
    externalSelection: require('./navigation/externalSelection'),
    openGoPro: require('./navigation/openGoPro'),
    switchToSettings: require('./navigation/switchToSettings')
}

import SplashDialog from './dialog/SplashDialog'
import PasswordDialog from './dialog/PasswordDialog'
import CreateRepositoryDialog from './dialog/CreateRepositoryDialog'

export {Callbacks, Navigation, SplashDialog, PasswordDialog, CreateRepositoryDialog}