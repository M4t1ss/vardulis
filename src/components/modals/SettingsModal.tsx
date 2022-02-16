import { Alert } from '../alerts/Alert'
import { BaseModal } from './BaseModal'
import { SettingsToggle } from './SettingsToggle'
import { HARD_MODE_ALERT_MESSAGE } from '../../constants/strings'

type Props = {
  isOpen: boolean
  handleClose: () => void
  isHardMode: boolean
  handleHardMode: Function
  isDarkMode: boolean
  handleDarkMode: Function
  isHardModeErrorModalOpen: boolean
  isHighContrastMode: boolean
  handleHighContrastMode: Function
}

export const SettingsModal = ({
  isOpen,
  handleClose,
  isHardMode,
  handleHardMode,
  isDarkMode,
  handleDarkMode,
  isHardModeErrorModalOpen: isHardModeAlertModalOpen,
  isHighContrastMode,
  handleHighContrastMode,
}: Props) => {
  return (
    <BaseModal title="Iestatījumi" isOpen={isOpen} handleClose={handleClose}>
      <div className="grid-cols-2 gap-4">
        <SettingsToggle
          settingName="Grūtais režīms"
          flag={isHardMode}
          handleFlag={handleHardMode}
        />
        <SettingsToggle
          settingName="Tumšais režīms"
          flag={isDarkMode}
          handleFlag={handleDarkMode}
        />
        <SettingsToggle
          settingName="Augsta kontrasta režīms"
          flag={isHighContrastMode}
          handleFlag={handleHighContrastMode}
        />
        <Alert
          message={HARD_MODE_ALERT_MESSAGE}
          isOpen={isHardModeAlertModalOpen}
        />
      </div>
    </BaseModal>
  )
}
