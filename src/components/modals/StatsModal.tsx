import { StatBar } from '../stats/StatBar'
import { Histogram } from '../stats/Histogram'
import { GameStats } from '../../lib/localStorage'
import { BaseModal } from './BaseModal'

type Props = {
  isOpen: boolean
  handleClose: () => void
  stats: number[]
}

export const StatsModal = ({ isOpen, handleClose, stats }: Props) => {
  const labels = ["Mēģinājumi", "Atminēti", 
                  "Šobrīd pēc kārtas", "Visvairāk pēc kārtas"]
  const values = [String(trys(stats)), String(successRate(stats))+'%', 
                  String(currentStreak(stats)), String(bestStreak(stats))]
  return (
    <BaseModal title="Statistics" isOpen={isOpen} handleClose={handleClose}>
      <StatBar gameStats={gameStats} />
      <h4 className="text-lg leading-6 font-medium text-gray-900">
        Guess Distribution
      </h4>
      <Histogram gameStats={gameStats} />
    </BaseModal>
  )
}
